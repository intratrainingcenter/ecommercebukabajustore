<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;

use App\Pemesanan_Temp as TransactionTemp;
use App\Opsi_Pemesanan_Temp as Cart;
use App\Pemesanan;
use App\Opsi_Pemesanan;
use App\Promo;
use App\Barang;
use App\ongkir;

/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;
use Mail;
use App\Mail\SendInvoicePurchase;


class FpaymentController extends Controller
{
   private $_api_context;

	public function __construct()
	{
		/** PayPal api context **/
		$paypal_conf = \Config::get('paypal');
		$this->_api_context = new ApiContext(new OAuthTokenCredential(
			$paypal_conf['client_id'],
			$paypal_conf['secret'])
	);
		$this->_api_context->setConfig($paypal_conf['settings']);
	}

	public function getcart()
    {
        $incartTransactionTemp = TransactionTemp::where([['kode_user',Auth::user()->kode_user],['status','incart']])->first();
        $listCart = Cart::where('kode_pemesanan',$incartTransactionTemp->kode_pemesanan)->with('detailProduct')->get();

        return $listCart;
    }

    public function getpromo($codePromo)
    {
            $dateNow = date('Y-m-d');

            $getcart = $this->getcart();
            $subtotal = $getcart->sum('subtotal');
            $resultCheck = Promo::where('kode_promo',$codePromo)
                            ->where('min_pembelian','<=',$subtotal)
                            ->whereRaw('"'. $dateNow .'" between master_promos.berlaku_awal and master_promos.berlaku_akhir')
                            ->first();
            return $resultCheck;
    }

    public function validationPayment($param)
    {
    	$param->validate([
    		'destinationCity' => 'required',
    		'courier' => 'required',
    		'service' => 'required',
    		'addressShipping' => 'required',
    		'total' => 'required',
    		'totalProduct' => 'required',
    	]);
    }

	public function payWithpaypal(Request $request)
	{
		$validate = $this->validationPayment($request);


        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $total = $request->total;
        $getpromo = $this->getpromo($request->promoCode);
        $discount = (!is_null($getpromo))?$getpromo->diskon:0;
        $request->merge([
            'discount'=>"$discount"
        ]);

        $total = $total - $discount;

        $item_1 = new Item();
        $item_1->setName('Total Final Shopping') /** item name **/
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setPrice($total); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));


        $amount = new Amount();
        $amount->setCurrency('USD')
                ->setTotal($total);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Payment checkout Buka Baju Store');

		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(route('statusPayment')) /** Specify return URL **/
		->setCancelUrl(route('statusPayment'));

		$payment = new Payment();
		$payment->setIntent('Sale')
		->setPayer($payer)
		->setRedirectUrls($redirect_urls)
		->setTransactions(array($transaction));
		/** dd($payment->create($this->_api_context));exit; **/
		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			if (\Config::get('app.debug')) {
				\Session::put('error', 'Connection timeout');
				return Redirect::to('/checkout');
			} else {
				\Session::put('error', 'Some error occur, sorry for inconvenient');
				return Redirect::to('/checkout');
			}
		}
		foreach ($payment->getLinks() as $link) {
			if ($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}
        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        /** menambahkan Data Request dari form shipping kedadalam session **/
		Session::put('request', $request->all());

		if (isset($redirect_url)) {
			/** redirect to paypal **/
			return Redirect::away($redirect_url);
		}
		\Session::put('error', 'Unknown error occurred');
		return Redirect::to('/checkout');
	}

	public function getPaymentStatus()
    {

        /** Get the payment ID before session clear **/
        $payment_id = Session::get('paypal_payment_id');

        /** Pengambilan Data request dari form shipping yang tadi di masukan di session request **/
        $request = Session::get('request');
        /** clear the session payment ID **/
        Session::forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            \Session::put('error', 'Payment failed');
            return Redirect::to('/checkout');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {
            $this->transactionCart($request);
            \Session::put('success', 'Payment success');
            return Redirect::to('/mypurchase');
        }
        \Session::put('error', 'Payment failed');
        return Redirect::to('/checkout');
    }

    public function transactionCart($dataRequest)
    {
        $getCart = $this->getcart();
        $transactionTemp = TransactionTemp::where([['kode_user',Auth::user()->kode_user],['status','incart']])->first();
        $dataService = explode(',', $dataRequest['service']);
        $service = $dataService[0];
        $periodShipping = $dataService[1];
        $costShipping = $dataService[2];

        foreach ($getCart as $itemCart) {
            $moveCart = Opsi_Pemesanan::create([
                'kode_pemesanan' => $itemCart->kode_pemesanan,
                'kode_barang' => $itemCart->kode_barang,
                'qty' => $itemCart->qty,
                'harga' => $itemCart->harga,
                'subtotal' => $itemCart->subtotal,
                'keterangan' => $itemCart->keterangan,
            ]);

            $getFirstStockProduct = Barang::where('kode_barang',$itemCart->kode_barang)->first();
            $reductionStockProduct =  Barang::where('kode_barang',$itemCart->kode_barang)->update([
                'stok' => $getFirstStockProduct->stok - $itemCart->qty,
            ]);
        }

        $removeProductFromCart = Cart::where('kode_pemesanan',$transactionTemp->kode_pemesanan)->delete();

        $codeShipping = "SHP-".date('ymdhis').$service."M".Auth::user()->id;

        $createTransactionHistory = Pemesanan::create([
            'kode_pemesanan' => $transactionTemp->kode_pemesanan,
            'kode_promo' => $dataRequest['promoCode'],
            'kode_user' => Auth::user()->kode_user,
            'tgl_pemesanan' => date('Y-m-d'),
            'grandtotal' => $dataRequest['total'],
            'diskon' => $dataRequest['discount'],
            'dibayar' => $dataRequest['total'] - $dataRequest['discount'],
            'alamat' => $dataRequest['addressShipping'],
            'kode_ongkir' => $codeShipping,
            'status' => 'paid',
        ]);

        $createDetailShipping = ongkir::create([
            'kode_ongkir' => $codeShipping,
            'kurir' => $dataRequest['courier'],
            'jenis_layanan' => $service,
            'jangka_pengiriman' => $periodShipping,
            'tarif' => $costShipping,
        ]);

        $removeTransactionTemp = TransactionTemp::where('kode_pemesanan',$transactionTemp->kode_pemesanan)->delete();

        Mail::send(new SendInvoicePurchase($transactionTemp->kode_pemesanan));
    }


}

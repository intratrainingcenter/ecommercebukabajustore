<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Pemesanan as historyTransaction;
use App\Barang as Product;
use App\Opsi_Pemesanan as OpsiTransaction;
use App\Retur as returnProduct;
use App\Opsi_Retur as opsiReturnProduct;

class FmypurchaseController extends Controller
{
    public function history()
    {

    	$historyTransaction = historyTransaction::where('kode_user',Auth::user()->kode_user)->orderBy('created_at','desc')->with('Return')->get();
		$data = array(
			'historyTransaction' => $historyTransaction,
			'page' => 'history',
		);
		return view('frontend.mypurchase.history',$data);
    }

    public function detailhistorytransaction(Request $request)
    {
    	$codeTransaction = decrypt($request->codeTransaction);
    	$detailHistoryTransaction = historyTransaction::where('kode_pemesanan',$codeTransaction)->with(['shippingService','detailPromo','opsiDetailHistory' => function ($query)
    	{
    		$query->with('detailProduct');
    	}])->first();

		$data = array(
			'detailHistoryTransaction' => $detailHistoryTransaction,
			'page' => 'detailhistory',
		);
		return view('frontend.mypurchase.history',$data);
    }


    // Return transaction
    public function retuntransaction(Request $request)
    {
      $codeTransaction = decrypt($request->codeTransaction);
      $detailHistoryTransaction = historyTransaction::where('kode_pemesanan',$codeTransaction)->with(['shippingService','detailPromo','opsiDetailHistory' => function ($query)
      	{
      		$query->with('detailProduct');
      	}])->first();

  		$data = array(
  			'detailHistoryTransaction' => $detailHistoryTransaction,
  			'page' => 'Return Transaction',
  		);
  		return view('frontend.mypurchase.history',$data);
    }

    public function formretuntransaction(Request $request)
    {
      $detailHistoryTransaction = historyTransaction::where('kode_pemesanan',$request->transactionId)->first();
      $returnTransaction = OpsiTransaction::where('kode_pemesanan',$request->transactionId)->wherein('kode_barang',explode(',', $request->productId))->with('detailProduct')->get();
      $itemreport = array(
        'page'                      => 'List Data Return Transaction',
        'datareport'                => $returnTransaction,
        'codeTransaction'           => $request->transactionId,
        'detailHistoryTransaction'  => $detailHistoryTransaction,
      );
      return view('frontend.mypurchase.history',$itemreport);
    }

    public function processretuntransaction(Request $request)
    {

      $codeReturn = "RT-".date('ymdhis')."M".Auth::user()->id;

      for ($i=0; $i < count($request->codeproduct); $i++) {

        $grandtotal[$i] = $request->priceproduct[$i] * $request->quantityReturn[$i];

        $opsireturnProduct = opsiReturnProduct::create([
          'kode_retur'   => $codeReturn,
          'kode_barang'  => $request->codeproduct[$i],
          'keterangan'   => $request->descriptionreturn[$i],
          'qty'          => $request->quantityReturn[$i],
          'harga'        => $request->priceproduct[$i],
          'subtotal'     => $request->priceproduct[$i] * $request->quantityReturn[$i],
        ]);
      }

      $retunProduct = returnProduct::create([
        'kode_retur' => $codeReturn,
        'kode_pemesanan' => $request->codetransaction,
        'kode_user' => Auth::user()->kode_user,
        'keterangan' => '',
        'tgl_retur' => date('Y-m-d'),
        'grandtotal' => array_sum($grandtotal),
        'cashback' => '0',
        'status' => 'Pending',
      ]);
      return redirect('mypurchase')->with('Return','Success');
    }

    public function listretuntransaction()
    {
      $data = array(
        'page'          => 'listreturn',
        'returnProduct' => returnProduct::all(),
      );
      return view('frontend.mypurchase.history',$data);
    }

    public function detailretuntransaction(Request $request)
    {
        $codeReturn = decrypt($request->codeReturn);
        $detailretunTransaction = returnProduct::where('kode_retur',$codeReturn)->with(['opsiDetailreturn'=> function($query)
        {
          $query->with('detailProductreturn');
        }])->first();
        // dd($detailretunTransaction);
        $data = array(
          'page'                    => 'detailreturn',
          'detailretunTransaction'  => $detailretunTransaction,
        );
        return view('frontend.mypurchase.history',$data);
    }
}

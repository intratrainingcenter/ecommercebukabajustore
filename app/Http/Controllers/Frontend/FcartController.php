<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Pemesanan as TransactionHistory;
use App\Pemesanan_Temp as TransactionTemp;
use App\Opsi_Pemesanan_Temp as Cart;
use App\Barang as Product;


class FcartController extends Controller
{
    public function addtocart(Request $request)
    {
        $idProduct = decrypt($request->idProduct);
        // check the 'pemesanan' table if there are transactions that are status = 'incart' by user login
        $incartTransactionTemp = TransactionTemp::where([['kode_user',Auth::user()->kode_user],['status','incart']]);
        // if transaction 'incart' is empty,system will generate a new code that is status incart
        if($incartTransactionTemp->get()->isEmpty()){
            // Call Function Generate new code
            $codeTransaction = $this->generateCodeTransaction();
            $createTransactionTemp = TransactionTemp::create([
                'kode_user' => Auth::user()->kode_user,
                'kode_pemesanan' => $codeTransaction,
                'status' => 'incart',
            ]);
        }else{
            $codeTransaction = $incartTransactionTemp->first()->kode_pemesanan;
        }

        $getProduct = Product::where('id',$idProduct)->first();

        // check the Cart if there is the same product, the system will only update the stock, price and subtotal
        $checkCart = Cart::where([['kode_pemesanan',$codeTransaction],['kode_barang',$getProduct->kode_barang]]);
        if($checkCart->get()->isEmpty()){
            $addProductToCart = Cart::create([
                'kode_pemesanan' => $codeTransaction,
                'kode_barang' => $getProduct->kode_barang,
                'qty' => $request->qtyProduct,
                'harga' => $getProduct->harga_jual,
                'keterangan'=> "",
                'subtotal' => $getProduct->harga_jual * $request->qtyProduct,
            ]);
        }else{
            $qtyProduct = $checkCart->first()->qty + $request->qtyProduct;
            $updateProductInCart = $checkCart->update([
                'qty' => $qtyProduct,
                'harga' => $getProduct->harga_jual,
                'subtotal' => $getProduct->harga_jual * $qtyProduct,
            ]);
        }

        // count cart to response for update data notify in cart 
        $sumProductcart = Cart::where('kode_pemesanan',$codeTransaction)->get()->count();

        return response()->json(['response'=>'success','amountProduct'=>$sumProductcart]);
    }

    public function generateCodeTransaction()
    {
        // Get transaction history by user login and get max
        $checkTransactionHistory = TransactionHistory::where('kode_user',Auth::user()->kode_user)->max('kode_pemesanan');
        // Get transaction temp by user login and get max
        $checkTransactionTemp = TransactionTemp::where('kode_user',Auth::user()->kode_user)->max('kode_pemesanan');

        // Check code max history and pick code max history 
        $codeMaxHistory = (!is_null($checkTransactionHistory))?$checkTransactionHistory:null;
        // Check code max temp and pick code max temp 
        $codeMaxTemp = (!is_null($checkTransactionTemp))?$checkTransactionTemp:null;

        // retrieval sequence after letter 18 if code max history not null
        $sequenceHistory = (!is_null($codeMaxHistory))?substr($codeMaxHistory, 18):0; 
        // retrieval sequence after letter 18 if code max temp not null
        $sequenceTemp = (!is_null($codeMaxTemp))?substr($codeMaxTemp, 18):0; 

        // comparison between sequence temp >= sequence history, if true the system will take the sequence from the sequence Temp
        $sequence = ($sequenceTemp >= $sequenceHistory)?$sequenceTemp:$sequenceHistory;

        // squence addition
        $sequence+=1;   

        $now=date("ymdhis");

        // Generate new code
        $codeTransaction = 'TR-'.$now.'U'.Auth::user()->id.'M'.$sequence;

        return $codeTransaction;
    }

    public function loadcart()
    {
        $incartTransactionTemp = TransactionTemp::where([['kode_user',Auth::user()->kode_user],['status','incart']])->first();
        $listCart = Cart::where('kode_pemesanan',$incartTransactionTemp->kode_pemesanan)->with('detailProduct')->get();

        $data = array(
            'listCart' => $listCart,
        );
        return view('frontend.shop.listsidecart',$data); 
    }

    public function sumproduct()
    {
        $incartTransactionTemp = TransactionTemp::where([['kode_user',Auth::user()->kode_user],['status','incart']])->first();
        $codeTransaction = $incartTransactionTemp->kode_pemesanan;
        
        // count cart to response for update data notify in cart 
        $sumProductcart = (!is_null($codeTransaction))?Cart::where('kode_pemesanan',$codeTransaction)->get()->count():0;
        return response()->json(['response'=>'success','amountProduct'=>$sumProductcart]);
    }

    public function removefromcart(Request $request)
    {
        $incartTransactionTemp = TransactionTemp::where([['kode_user',Auth::user()->kode_user],['status','incart']])->first();
        $codeTransaction = $incartTransactionTemp->kode_pemesanan;
        $codeProduct = decrypt($request->codeProduct);

        $removeProduct = Cart::where([['kode_pemesanan',$codeTransaction],['kode_barang',$codeProduct]])->delete();

        // count cart to response for update data notify in cart 
        $sumProductcart = Cart::where('kode_pemesanan',$codeTransaction)->get()->count();

        return response()->json(['response'=>'success','amountProduct'=>$sumProductcart]);
    }

    public function clearcart()
    {
       $incartTransactionTemp = TransactionTemp::where([['kode_user',Auth::user()->kode_user],['status','incart']])->first();
       $codeTransaction = $incartTransactionTemp->kode_pemesanan;

       $removeProduct = Cart::where('kode_pemesanan',$codeTransaction)->delete();

       // count cart to response for update data notify in cart 
       $sumProductcart = Cart::where('kode_pemesanan',$codeTransaction)->get()->count();

       return response()->json(['response'=>'success','amountProduct'=>$sumProductcart]);
   }
}

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
        // Check table pemesanan apakah ada transaksi berstatus 'incart'
        $incartTransactionTemp = TransactionTemp::where([['kode_user',Auth::user()->kode_user],['status','incart']]);
        if($incartTransactionTemp->get()->isEmpty()){
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

        $checkCart = Cart::where([['kode_pemesanan',$codeTransaction],['kode_barang',$getProduct->kode_barang]]);
        if($checkCart->get()->isEmpty()){
            $addProductToCart = Cart::create([
                'kode_pemesanan' => $codeTransaction,
                'kode_barang' => $getProduct->kode_barang,
                'qty' => $request->qtyProduct,
                'harga' => $getProduct->harga_jual,
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

        $sumProductcart = Cart::where('kode_pemesanan',$codeTransaction)->get()->count();

        return response()->json(['response'=>'success','amountProduct'=>$sumProductcart]);
    }

    public function generateCodeTransaction()
    {
        $checkTransactionHistory = TransactionHistory::where('kode_user',1)->max('kode_pemesanan');
        $checkTransactionTemp = TransactionTemp::where('kode_user',1)->max('kode_pemesanan');

        $codeMaxHistory = (!is_null($checkTransactionHistory))?$checkTransactionHistory:null;
        $codeMaxTemp = (!is_null($checkTransactionTemp))?$checkTransactionTemp:null;

        $sequenceHistory = (!is_null($codeMaxHistory))?substr($codeMaxHistory, 18):0; 
        $sequenceTemp = (!is_null($codeMaxTemp))?substr($codeMaxTemp, 18):0; 

        $sequence = ($sequenceTemp >= $sequenceHistory)?$sequenceTemp:$sequenceHistory;


        $sequence+=1;   

        $now=date("ymdhis");

        // $codeTransaction = 'TR-'.$now.'U'.iduserauth.'M'.$sequence;
        $codeTransaction = 'TR-'.$now.'U'.'1'.'M'.$sequence;

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

        $sumProductcart = Cart::where('kode_pemesanan',$codeTransaction)->get()->count();
        return response()->json(['response'=>'success','amountProduct'=>$sumProductcart]);
    }

    public function removefromcart(Request $request)
    {
        $incartTransactionTemp = TransactionTemp::where([['kode_user',Auth::user()->kode_user],['status','incart']])->first();
        $codeTransaction = $incartTransactionTemp->kode_pemesanan;
        $codeProduct = decrypt($request->codeProduct);

        $removeProduct = Cart::where([['kode_pemesanan',$codeTransaction],['kode_barang',$codeProduct]])->delete();

        $sumProductcart = Cart::where('kode_pemesanan',$codeTransaction)->get()->count();

        return response()->json(['response'=>'success','amountProduct'=>$sumProductcart]);
    }
}

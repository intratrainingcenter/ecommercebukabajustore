<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Pemesanan as historyTransaction;
use App\Barang as Product;

class FmypurchaseController extends Controller
{
    public function history()
    {
    	$historyTransaction = historyTransaction::where('kode_user',Auth::user()->kode_user)->orderBy('created_at','desc')->get();
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
      $data =[];
      $historyTransaction = [];
      for ($i=0; $i <count($request->transactionId) ; $i++) {
        $historyTransaction = historyTransaction::where('kode_pemesanan',$request->transactionId[$i])->first();
      }

      $returnTransaction = Product::all();
      foreach ($returnTransaction as $itemsreturnTransaction) {
        dd($itemsreturnTransaction->kode_barang);
        // for ($i=0; $i < count($request->productId) ; $i++) {
        //   if ($itemsreturnTransaction->kode_barang == $request->productId[$i]) {
        //     $data = $itemsreturnTransaction;
        //   }
        // }
      }
      dd($data);
      $itemreport = array(
        'page'                => 'List Data Return Transaction',
        'datareport'          => $data,
        'historyTransaction'  => $historyTransaction,
      );
      return view('frontend.mypurchase.history',$itemreport);
    }
}

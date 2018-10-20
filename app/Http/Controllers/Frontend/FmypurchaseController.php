<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Pemesanan as historyTransaction;

class FmypurchaseController extends Controller
{
    public function history()
    {
    	$historyTransaction = historyTransaction::where('kode_user',Auth::user()->kode_user)->get();
		$data = array(
			'historyTransaction' => $historyTransaction,
			'page' => 'history',
		);
		return view('frontend.mypurchase.history',$data);
    }

    public function detailhistorytransaction(Request $request)
    {
    	$codeTransaction = decrypt($request->codeTransaction);
    	$detailHistoryTransaction = historyTransaction::where('kode_pemesanan',$codeTransaction)->with(['shippingService','detailPromo','opsiDetailHistory'])->first();
    	dd($detailHistoryTransaction);
		$data = array(
			'detailHistoryTransaction' => $detailHistoryTransaction,
			'page' => 'detailhistory',
		);
		return view('frontend.mypurchase.history',$data);
    }
}

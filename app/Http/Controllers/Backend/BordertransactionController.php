<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
Use App\Pemesanan;


class BordertransactionController extends Controller
{
	public function index()
	{
		$data = array(
			'page' => 'Order Transaction',
			'dataOrder' => Pemesanan::orderBy('updated_at','desc')->get(),
		);
		
		return view('backend.ordertransaction.index',$data);
	}

	public function detailorder(Request $request)
	{
		$idTransaction = decrypt($request->id);
		
		$detailOrder = Pemesanan::where('id',$idTransaction)->with(['detailUser','shippingService','detailPromo','opsiDetailHistory' => function ($query)
    	{
    		$query->with('detailProduct');
    	}])->first();

		$data = array(
			'page' => 'Order Transaction',
			'detailOrder' => $detailOrder,
		);

		return view('backend.ordertransaction.detail',$data);
	}
}

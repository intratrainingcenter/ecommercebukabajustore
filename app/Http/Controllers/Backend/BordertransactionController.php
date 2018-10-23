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
}

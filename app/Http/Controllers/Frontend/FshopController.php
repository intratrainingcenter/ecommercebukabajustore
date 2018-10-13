<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Barang;

class FshopController extends Controller
{
	public function index()
	{
		$data = array(
			'page' => 'shop',
			'dataProduct' => Barang::all(),
		);
		return view('frontend.shop.index',$data);
	}

	public function detailproduct($id)
	{
		$id = decrypt($id);
		$data = array(
			'page' => 'shop',
			'detailProduct' => Barang::where('id',$id)->with('category')->first(), 
		);
		return view('frontend.shop.detailproduct',$data);
	}
}

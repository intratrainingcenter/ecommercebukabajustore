<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BpromoController extends Controller
{
     public function index()
    {
    	$data = array(
    		'page' => 'Promo',
    	);

    	return view('backend.promo.index',$data);
    }

    public function detailpromo($id)
    {
    	$data =  array(
    		'page' => 'Promo',
    	);

    	return view('backend.promo.detailpromo',$data);
    }
}

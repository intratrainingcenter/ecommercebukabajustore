<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategori;

class FhomeController extends Controller
{
    public function index()
    {
      $data = array(
        'page' => 'home',
        'showcategory' => Kategori::orderBy('created_at', 'DESC')->limit(5)->get(),
      );
    	return view('frontend.home.index',$data  );
    }
}

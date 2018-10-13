<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FhomeController extends Controller
{
    public function index()
    {
      $data = array(
        'page' => 'home',
      );
    	return view('frontend.home.index',$data  );
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Promo;

class FpromoController extends Controller
{
    public function index()
    {
      $data = array(
        'page' => 'promo',
        'showpromo' => Promo::all(),
      );

        return view('frontend.promo.index',$data);
    }
}

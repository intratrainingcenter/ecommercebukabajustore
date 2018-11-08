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
        'showpromo' => Promo::where('berlaku_awal', '<=' ,date("Y-m-d"))->where('berlaku_akhir', '>=' ,date("Y-m-d"))->orderBy('updated_at', 'desc')->paginate(9),
      );

        return view('frontend.promo.index',$data);
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\About;

class FaboutController extends Controller
{
    public function showabout()
    {
      $data = array(
        'page' => 'about',
        'showabout' => About::where('status','Active')->get(),
      );

      return view('frontend.about.index',$data);
    }
}

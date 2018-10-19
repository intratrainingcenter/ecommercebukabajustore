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
        'showabout' => About::all(),
      );

      return view('frontend.about.index',$data);
    }
}

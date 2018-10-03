<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
class BsliderController extends Controller
{
   public function index() {
    return view('backend.slider.index');
   }
}

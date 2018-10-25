<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pemesanan;

class FtrackorderController extends Controller
{
  public function index()
  {
    return view('frontend.trackorder.index');
  }

  public function tracking(Request $request)
  {
	$trackingOrder = Pemesanan::where('kode_pemesanan',$request->codeTransaction)->first();
	$data = array(
		'trackingOrder' => $trackingOrder,
	);

	return view('frontend.trackorder.trackresult',$data);
  }
}

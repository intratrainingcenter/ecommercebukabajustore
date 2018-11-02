<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Kategori;
use App\Slider;
use App\Pemesanan;
use App\Ulasan;
use App\Barang_Favorit;

class FhomeController extends Controller
{

    public function index()
    {
	// $bestSeller = Pemesanan::where('status','received')->with(['opsiDetailHistory' => function ($query)
	// {
	// 	return $query->with('detailProduct');
	// }])->get();


    $topRate = Ulasan::select(DB::raw("SUM(rating) as rating,kode_barang"))
			    ->with('relationproduct')
			    ->groupBy('kode_barang')
			    ->take(10)
			    ->get();

      $data = array(
        'page' => 'home',
        'showslider' => Slider::where('status', 'Active')->get(),
        'showcategory' => Kategori::orderBy('created_at', 'DESC')->limit(5)->get(),
        'dataWishlist' => Barang_Favorit::all(),
        'bestSeller' => 'bestSeller',
        'topRate' => $topRate,
      );
    	return view('frontend.home.index',$data  );
    }
}

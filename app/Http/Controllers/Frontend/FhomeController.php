<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Kategori;
use App\Slider;
use App\Pemesanan;
use App\Opsi_Pemesanan;
use App\Ulasan;
use App\Barang_Favorit;

class FhomeController extends Controller
{

    public function index()
    {
	    $bestSeller = Opsi_pemesanan::whereExists(function ($query) {
	                $query->select(DB::raw(1))
	                      ->from('pemesanans')
	                      ->whereRaw('pemesanans.kode_pemesanan = opsi_pemesanans.kode_pemesanan')
	                      ->whereRaw('pemesanans.status != "cancel"');
	            })->select(DB::raw("SUM(qty) as qty,kode_barang"))
	    		  ->with('detailProduct')
	    		  ->groupBy('kode_barang')
	    		  ->orderBy('qty','desc')
	    		  ->take(10)
	    		  ->get();

	    $topRate = Ulasan::where('status','selesai')->select(DB::raw("SUM(rating) as rating,kode_barang"))
				    ->with('relationproduct')
				    ->groupBy('kode_barang')
				    ->orderBy('rating','desc')
				    ->take(10)
				    ->get();

	    $data = array(
	        'page' => 'home',
	        'showslider' => Slider::where('status', 'Active')->get(),
	        'showcategory' => Kategori::orderBy('created_at', 'DESC')->limit(5)->get(),
	        'dataWishlist' => Barang_Favorit::where('kode_user',Auth::user()->kode_user)->get(),
	        'bestSeller' => $bestSeller,
	        'topRate' => $topRate,
	      );
	    	return view('frontend.home.index',$data  );
    }
}

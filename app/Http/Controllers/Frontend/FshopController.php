<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Barang;
use App\Kategori;
use App\Opsi_Pemesanan;
use App\Barang_Favorit;
use App\Ulasan;

class FshopController extends Controller
{
	public function index(Request $request,$category)
	{

		$getCategory = Kategori::where('nama_kategori',$category)->first();
		$codeCategory = (!is_null($getCategory))?$getCategory->kode_kategori:"";

		$dataProduct = DB::table('master_barangs')->when($category != 'all', function ($query) use ($codeCategory)
		{
			return $query->where('kode_kategori',$codeCategory);
		})->when($request->q, function ($query) use ($request)
		{
			return $query->where('nama_barang','like','%'.$request->q.'%');
		})->when($request->pmin, function ($query) use ($request)
		{
			return $query->whereBetween('harga_jual',[$request->pmin,$request->pmax]);
		})->when($request->sortby, function ($query) use ($request)
		{	
			if($request->sortby == 'news'){
				return $query->latest();
			}elseif($request->sortby == 'phigh'){
				return $query->orderBy('harga_jual','desc');
			}elseif($request->sortby == 'plow'){
				return $query->orderBy('harga_jual','asc');
			}
		})->paginate(20);

		
		$data = array(
			'page' => 'shop',
			'dataProduct' => $dataProduct,
			'dataCategory' => Kategori::all(),
			'dataWishlist' => Barang_Favorit::all(),
		);
		return view('frontend.shop.index',$data);
	}

	public function detailproduct($id)
	{
		$id = decrypt($id);
		$detailProduct =  Barang::where('id',$id)->with('category')->first();
		$data = array(
			'page' => 'shop',
			'detailProduct' => $detailProduct,
			'dataWishlist' => Barang_Favorit::all(),
			'dataReview' => Ulasan::with('relationuser')->where('status','selesai')->where('kode_barang',$detailProduct->kode_barang)->get(),
		);
		
		return view('frontend.shop.detailproduct',$data);
	}

}

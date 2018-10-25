<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Barang;
use App\Kategori;
use App\Opsi_Pemesanan;
use App\Barang_Favorit;
use App\Ulasan;
use Illuminate\Support\Facades\DB;

class FshopController extends Controller
{
	public function index()
	{
		$data = array(
			'page' => 'shop',
			'dataProduct' => Barang::paginate(8),
			'dataCategory' => Kategori::all(),
			'dataWishlist' => Barang_Favorit::all(),
		);
		return view('frontend.shop.index',$data);
	}

	public function detailproduct($id)
	{
		$id = decrypt($id);
		$data = array(
			'page' => 'shop',
			'detailProduct' => Barang::where('id',$id)->with('category')->first(),
			'dataWishlist' => Barang_Favorit::all(),
			'dataReview' => Ulasan::with('relationuser')->where('status','selesai')->get(),
		);
		return view('frontend.shop.detailproduct',$data);
	}

	public function searchproduct($search)
	{
		$data = array(
			'page' => 'shop',
			'dataProduct' => Barang::where('nama_barang','like','%'.$search.'%')->get(),
		);
		return view('frontend.shop.showproductafterfilter',$data);
	}

	public function categoryproduct($codecategory)
	{
		$data = array(
			'page' => 'shop',
			'dataProduct' => Barang::where('kode_kategori',$codecategory)->get(),
		);
		return view('frontend.shop.showproductafterfilter',$data);
	}

	public function lowtohightproduct()
	{
		$data = array(
			'page' => 'shop',
			'sortbyactive' => 'Price: Low to High',
			'dataProduct' => Barang::orderBy('harga_jual','asc')->get()
		);
		return view('frontend.shop.showproductafterfilter',$data);
	}

	public function highttolowproduct()
	{
		$data = array(
			'page' => 'shop',
			'dataProduct' => Barang::orderBy('harga_jual','desc')->get()
		);
		return view('frontend.shop.showproductafterfilter',$data);
	}

	public function newnessproduct()
	{
		$data = array(
			'page' => 'shop',
			'dataProduct' => Barang::orderBy('created_at','asc')->get()
		);
		return view('frontend.shop.showproductafterfilter',$data);
	}

	public function averagerating()
	{
		$data = array(
			'page' => 'shop',
			'dataProduct' => Barang::orderBy('created_at','asc')->get()
		);
		return view('frontend.shop.showproductafterfilter',$data);
	}

	public function popularityproduct()
	{
		dd(Opsi_Pemesanan::count('kode_barang'));
		$data = array(
			'page' => 'shop',
			'dataProduct' => Barang::orderBy('created_at','asc')->get()
		);
		return view('frontend.shop.showproductafterfilter',$data);
	}

	public function rangepriceproduct($min,$max)
	{
		$data = array(
			'page' => 'shop',
			'dataProduct' => Barang::whereBetween('harga_jual',[$min,$max])->get()
		);
		return view('frontend.shop.showproductafterfilter',$data);
	}
}

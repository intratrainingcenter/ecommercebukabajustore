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
	public function index(Request $request,$category)
	{
		switch ($category) {
			case 'all':
				if($request->pmin != null){
					$dataProduct = Barang::where('nama_barang','like','%'.$request->q.'%')->whereBetween('harga_jual',[$request->pmin,$request->pmax])->paginate(20);	
				}else{
					$dataProduct = Barang::where('nama_barang','like','%'.$request->q.'%')->paginate(20);
				}
			break;
			
			default:
				$getCategory = Kategori::where('nama_kategori',$category)->first();
				$codecategory = (!is_null($getCategory))?$getCategory->kode_kategori:"";

				if($request->pmin != null){
					$dataProduct = Barang::where('kode_kategori',$codecategory)->where('nama_barang','like','%'.$request->q.'%')->whereBetween('harga_jual',[$request->pmin,$request->pmax])->paginate(20);	
				}else{
					$dataProduct = Barang::where('kode_kategori',$codecategory)->where('nama_barang','like','%'.$request->q.'%')->paginate(20);
				}
			break;
		}
		
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

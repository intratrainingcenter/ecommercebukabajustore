<?php

namespace App\Http\Controllers\Frontend;;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Barang_Favorit;
use App\Barang;

class FwishlistController extends Controller
{

  public function addproduct($idproduct)
  {
    $addwishlist = new Barang_Favorit;
    $addwishlist->kode_user = Auth::user()->kode_user;
    $addwishlist->kode_barang = $idproduct;
    $addwishlist->save();

    return 'success';
  }

  public function removeproduct($idproduct)
  {
    Barang_Favorit::where('kode_barang',$idproduct)->where('kode_user',Auth::user()->kode_user)->delete();

    return 'success';
  }

  public function showproduct()
  {
    $showwishlist = Barang_Favorit::with('product')->where('kode_user',Auth::user()->kode_user)->get();

    $data = array(
      'wishlist' => $showwishlist,
    );
    return view('frontend.wishlist.index',$data);
  }

  public function wishlist()
  {
    $showwishlist = Barang_Favorit::with('product')->where('kode_user',Auth::user()->kode_user)->get();

    return 'success';
  }

  public function countwishlist()
  {
    $countwislist = Barang_Favorit::where('kode_user',Auth::user()->kode_user)->count();

    return $countwislist;
  }

}

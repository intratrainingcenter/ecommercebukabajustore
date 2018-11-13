<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\setting;
use App\Kategori;
use App\Pemesanan;
use App\Retur;
use App\User;
use App\Barang;
class BsettingController extends Controller
{
  public function index()
  {
    $data = array(
      'page' => 'Setting',
      'setting' => setting::first(),
    );

    return view('backend.setting.index',$data);
  }

  public function updatesetting(Request $request)
  {
    $updatesetting = setting::find($request->id);

    if ($request->imageWebsite) {
      // makeDirectory ( create Directory )
      $createdirectory = Storage::makeDirectory('public/imagesetup');
      // str_replace ( take string )
      $image = str_replace('data:image/png;base64,', '', $request->imageWebsite);
      $image = str_replace(' ','+',$image);
      // str_random ( create string random )
      $namefile = str_random(16).'.png';
      // put ( move )
      Storage::put('public/imagesetup'.'/'.$namefile, base64_decode($image));
      $getdatasetting = setting::find($request->id);
      // delete ( delete file )
      Storage::delete('public/imagesetup'.'/'.$getdatasetting->foto);
      $updatesetting->foto = $namefile;
    }

    $updatesetting->nama_web = $request->name_website;
    $updatesetting->alamat = $request->address;
    $updatesetting->no_telp = $request->phone;
    $updatesetting->email = $request->email;
    $updatesetting->deskripsi = $request->description;
    $updatesetting->save();

    return redirect('setting');
  }

  public function showsetting()
  {
    $setting = setting::first();
    return $setting;
  }

  public function settingfront()
  {
    $setting = setting::first();
    // take ( take 5 data )
    $category = Kategori::orderBy('created_at','desc')->take(5)->get();

    return response()->json(['setting'=>$setting,'category'=>$category]);
  }

  public function notification()
  {
    $transaction = Pemesanan::where('status','pending')->count();
    $transactionReturn = Retur::where('status','pending')->count();

    return response()->json(['transaction'=>$transaction, 'transactionReturn'=>$transactionReturn]);
  }

}

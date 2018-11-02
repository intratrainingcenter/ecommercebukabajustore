<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\setting;
use App\Kategori;

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
      $createdirectory = Storage::makeDirectory('public/imagesetup');
      $image = str_replace('data:image/png;base64,', '', $request->imageWebsite);
      $image = str_replace(' ','+',$image);
      $namefile = str_random(16).'.png';
      Storage::put('public/imagesetup'.'/'.$namefile, base64_decode($image));
      $getdatasetting = setting::find($request->id);
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
    $category = Kategori::orderBy('created_at','desc')->take(5)->get();

    return response()->json(['setting'=>$setting,'category'=>$category]);
  }

}

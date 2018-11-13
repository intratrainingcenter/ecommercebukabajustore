<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Slider;

class BsliderController extends Controller
{
    public function index()
  {

    $data = array(
      'page' => 'Slider',
      'dataslider' => Slider::all(),
    );

    return view('backend.slider.index',$data);
  }

  public function loaddataslider()
  {
    $data = array(
      'dataslider' => Slider::all(),
    );
    return view('backend.slider.tabledataslider',$data);
  }

  public function addslider()
  {
     
    $data = array(
      'page' => 'Slider',
    );
    return view('backend.slider.addslider',$data);
  }

  public function createslider(Request $request)
  {
    $validatepromo = $request->validate([
      'imageslider' => 'required',
      'description' => 'required',
      'status' => 'required',
    ]);

    // makeDirectory ( create Directory )
    $createdirectory = Storage::makeDirectory('public/imageslider');
    // str_replace ( take string )
    $image = str_replace('data:image/png;base64,', '', $request->imageslider);
    $image = str_replace(' ','+',$image);
    // str_random ( create string random )
    $namefile = str_random(16).'.png';
    // put ( move )
    Storage::put('public/imageslider'.'/'.$namefile, base64_decode($image));

    $createslider = slider::create([
      'foto' => $namefile,
      'lokasifoto' => 'public/imageslider',
      'created_by' => Auth::user()->kode_user,
      'status' => $request->status,
      'deskripsi' => $request->description,
    ]);
    // redirect->route ( call name in route )
    return redirect()->route('sliderindex')->with('success','data was successfully added.');
  }

  public function detailslider($id)
  {
    $data =  array(
      'page' => 'slider',
      'detailslider' => slider::find($id),
    );

    return view('backend.slider.detailslider',$data);
  }

  public function editslider($id)
  {
    $data =  array(
      'page' => 'slider',
      'dataslider' => slider::find($id),
    );

    return view('backend.slider.editslider',$data);
  }

  public function updateslider(Request $request)
  {
    $validatepromo = $request->validate([
      'description' => 'required',
      'status' => 'required',
    ]);
    
    if($request->imageslider == null){
      $createslider = slider::where('id',$request->id)->update([
      'created_by' => Auth::user()->kode_user,
      'status' => $request->status,
      'deskripsi' => $request->deskripsi,
      ]);
    }else{
      $createdirectory = Storage::makeDirectory('public/imageslider');
      $image = str_replace('data:image/png;base64,', '', $request->imageslider);
      $image = str_replace(' ','+',$image);
      // str_random ( make string random )
      $namefile = str_random(16).'.png';
      // put ( move )
      Storage::put('public/imageslider'.'/'.$namefile, base64_decode($image));
      $getdataslider = slider::find($request->id);
      // delete ( delete file )
      Storage::delete('public/imageslider'.'/'.$getdataslider->foto);

      $createslider = slider::where('id',$request->id)->update([
        'foto' => $namefile,
        'created_by' => Auth::user()->kode_user,
        'status' => $request->status,
        'deskripsi' => $request->deskripsi,
      ]);
    }
    // redirect -> route ( call name in route )
    return redirect()->route('sliderindex')->with('success','data was successfully updated.');
  }

  public function deleteslider(Request $request)
  {
    $deleteslider = slider::find($request->idslider);
    // delete ( delete file )
    Storage::delete('public/imageslider'.'/'.$deleteslider->foto);
    $deleteslider->delete();

    return 'success';
  }
}

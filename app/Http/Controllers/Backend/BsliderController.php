<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
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
    $createdirectory = Storage::makeDirectory('public/imageslider');
    $foto = str_replace('data:image/png;base64,', '', $request->imageslider);
    $foto = str_replace(' ','+',$foto);
    $namefile = str_random(16).'.png';
    Storage::put('public/imageslider'.'/'.$namefile, base64_decode($foto));

    $createslider = slider::create([
      'foto' => $namefile,
      'lokasifoto' => 'public/imageslider',
      'created_by' => $request->Createdby,
      'status' => $request->status,
      'deskripsi' => $request->deskripsi,
    ]);

    return redirect('slider'); 
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
    if($request->imageslider == null){
      $createslider = slider::where('id',$request->id)->update([
      'created_by' => $request->Createdby,
      'status' => $request->status,
      'deskripsi' => $request->deskripsi,
      ]);
    }else{
      $createdirectory = Storage::makeDirectory('public/imageslider');
      $foto = str_replace('data:image/png;base64,', '', $request->imageslider);
      $foto = str_replace(' ','+',$foto);
      $namefile = str_random(16).'.png';
      Storage::put('public/imageslider'.'/'.$namefile, base64_decode($foto));
      $getdataslider = slider::find($request->id);
      Storage::delete('public/imageslider'.'/'.$getdataslider->foto);

      $createslider = slider::where('id',$request->id)->update([
        'foto' => $namefile,
        'created_by' => $request->Createdby,
        'status' => $request->status,
        'deskripsi' => $request->deskripsi,
      ]);
    }

    return redirect()->route('sliderIndex'); 
  }

  public function deleteslider(Request $request)
  {
    $deleteslider = slider::find($request->idslider);
    Storage::delete('public/imageslider'.'/'.$deleteslider->foto);
    $deleteslider->delete();

    return 'success';
  }
}

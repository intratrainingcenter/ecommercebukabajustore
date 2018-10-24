<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\About;

class BaboutController extends Controller
{

  public function index()
  {

    $data = array(
      'page' => 'About',
      'dataAbout' => About::all(),
    );
    return view('backend.about.index',$data);
  }

  public function loaddataabout()
  {
    $data = array(
      'dataAbout' => About::all(),
    );
    return view('backend.about.tabledataabout',$data);
  }

  public function addabout()
  {
    $data = array(
      'page' => 'About',
    );
    return view('backend.about.addabout',$data);
  }

  public function createabout(Request $request)
  {
    $validateabout = $request->validate([
      'imageAbout' => 'required',
      'Title' => 'required',
      'Description' => 'required'
    ]);

    $createdirectory = Storage::makeDirectory('public/imageabout');
    $foto = str_replace('data:image/png;base64,', '', $request->imageAbout);
    $foto = str_replace(' ','+',$foto);
    $namefile = str_random(16).'.png';
    Storage::put('public/imageabout'.'/'.$namefile, base64_decode($foto));

    $createabout = About::create([
      'foto' => $namefile,
      'judul' => $request->Title,
      'lokasifoto' => 'public/imageabout',
      'deskripsi' => $request->Description,
      'status'=> 'Active',
    ]);

    return redirect()->route('aboutIndex');
  }

  public function detailabout($id)
  {

    $data =  array(
      'page' => 'About',
      'detailAbout' => About::find($id),
    );
    return view('backend.about.detailabout',$data);
  }

  public function editabout($id)
  {
    $data =  array(
      'page' => 'About',
      'dataAbout' => About::find($id),
    );

    return view('backend.about.editabout',$data);
  }
  public function updateabout(Request $request)
  {

    $validateabout = $request->validate([
      'Title' => 'required',
      'Description' => 'required',
      'Status' => 'required',
    ]);


    if($request->imageAbout == null){
      $createaboout = About::where('id',$request->id)->update([
        'judul' => $request->Title,
        'deskripsi' => $request->Description,
        'status' => $request->Status,
      ]);
    }else{
      $createdirectory = Storage::makeDirectory('public/imageabout');
      $foto = str_replace('data:image/png;base64,', '', $request->imageAbout);
      $foto = str_replace(' ','+',$foto);
      $namefile = str_random(16).'.png';
      Storage::put('public/imageabout'.'/'.$namefile, base64_decode($foto));
      $getdataabout = About::find($request->id);
      Storage::delete('public/imageabout'.'/'.$getdataabout->foto);

      $createabout = About::find($request->id);
      $createabout->foto = $namefile;
      $createabout->judul = $request->Title;
      $createabout->deskripsi = $request->Description;
      $createabout->status = $request->Status;
      $createabout->save();
    }
    return redirect()->route('aboutIndex');
  }

  public function deleteabout(Request $request)
  {
    $deleteabout = About::find($request->idAbout);
    Storage::delete('public/imageabout'.'/'.$deleteabout->foto);
    $deleteabout->delete();

    return 'success';
  }
  public function tabledataabout()
  {
    $data = array(
      'page' => 'About',
      'dataAbout' => About::all(),
    );
    return view('backend.about.tabledataabout',$data);
  }

  // }
}

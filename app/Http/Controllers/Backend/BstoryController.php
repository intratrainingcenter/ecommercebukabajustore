<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

use App\Story;

class BstoryController extends Controller
{
    public function index()
    {
      $data = array(
        'page'  => 'Story',
        'story' =>Story::all(),
      );
      return view('backend.story.index',$data);
    }
    public function addstory()
    {
      return view('backend.story.addstory',['page' => 'Story']);
    }
    public function createstory(Request $request)
    {
      $save = Story::create([
        'created_by'  =>'tono',
        'foto'        =>$request->images,
        'lokasifoto'  =>'mana aja',
        'deskripsi'   =>$request->deskripsi,
        'status'      =>'Aktif',
      ]);
      return redirect('story')->with('add','Story');
    }
    public function updatestory($id)
    {
      dd('ini edit'.$id);
    }
    public function deletestory(Request $request)
    {
      dd($request->id);
    }
    public function detailstory($id)
    {
      dd('ini detail'.$id);
    }
}

<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Story;
use Auth;

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
      $createdirectory = Storage::makeDirectory('public/imagestory');
      $image = str_replace('data:image/png;base64,', '', $request->imagestory);
      $image = str_replace(' ','+',$image);
      $namefile = str_random(16).'.png';
      Storage::put('public/imagestory'.'/'.$namefile, base64_decode($image));
      $save = Story::create([
        'created_by'  =>Auth::User()->name,
        'foto'        =>$namefile,
        'lokasifoto'  =>'/public/imagestory',
        'deskripsi'   =>$request->deskripsi,
        'status'      =>'Aktif',
      ]);
      return redirect('story')->with('add','Story');
    }

    public function showupdatestory($id)
    {
      $data = array(
        'story' => Story::find($id),
        'page'  => 'Story',
      );
      return view('backend.story.updatestory',$data);
    }

    public function updatestory(Request $request)
    {
      if ($request->images == null)
      {
        $storyupdate = Story::find($request->storyid);
        $storyupdate->update([
          'created_by'  =>Auth::User()->name,
          'deskripsi' =>$request->deskripsi,
          'status'    =>$request->status,
        ]);
        return redirect('story')->with('update','Story');
      }else
      {
        $createdirectory = Storage::makeDirectory('public/imagestory');
        $image = str_replace('data:image/png;base64,', '', $request->imagestory);
        $image = str_replace(' ','+',$image);
        $namefile = str_random(16).'.png';
        Storage::put('public/imagestory'.'/'.$namefile, base64_decode($image));
        Storage::delete('public/imagestory'.'/'.$request->valueImage);
        $storyupdate = Story::find($request->storyid);
        $storyupdate->update([
          'created_by'  =>Auth::User()->name,
          'foto'      =>$namefile,
          'deskripsi' =>$request->deskripsi,
          'status'    =>$request->status,
        ]);
        return redirect('story')->with('update','Story');
      }
    }

    public function deletestory(Request $request)
    {
      $deletestory = Story::find($request->idStory);
      Storage::delete('public/imagestory'.'/'.$deletestory->foto);
      $deletestory->delete();

      return 'success';
    }

    public function detailstory($id)
    {
      $data =array(
        'page'    =>'Story',
        'detailstory'  => Story::find($id),
      );
      return view('backend.story.detailstory',$data);
    }

    public function loadstory()
    {
      return view('backend.story.tabledatastory',['data'=> story::all()]);
    }
}

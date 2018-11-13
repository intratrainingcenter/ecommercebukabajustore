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
      // makeDirectory ( create Directory )
      $createdirectory = Storage::makeDirectory('public/imagestory');
      // str_replace ( take string )
      $image = str_replace('data:image/png;base64,', '', $request->imagestory);
      $image = str_replace(' ','+',$image);
      // str_random ( create string random )
      $namefile = str_random(16).'.png';
      // put ( move )
      Storage::put('public/imagestory'.'/'.$namefile, base64_decode($image));
      $save = Story::create([
        'created_by'  =>Auth::User()->name,
        'foto'        =>$namefile,
        'lokasifoto'  =>'/public/imagestory',
        'judul'       =>$request->title,
        'deskripsi'   =>$request->deskripsi,
        'status'      =>'Active',
      ]);
      
      return redirect('story')->with('success','data was successfully added.');
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
          'judul'       =>$request->title,
          'deskripsi' =>$request->deskripsi,
          'status'    =>$request->status,
        ]);

      }else
      {
        // makeDirectory ( create Directory )
        $createdirectory = Storage::makeDirectory('public/imagestory');
        // str_replace ( take string  )
        $image = str_replace('data:image/png;base64,', '', $request->imagestory);
        $image = str_replace(' ','+',$image);
        $namefile = str_random(16).'.png';
        // put ( move )
        Storage::put('public/imagestory'.'/'.$namefile, base64_decode($image));
        // delete ( delete file )
        Storage::delete('public/imagestory'.'/'.$request->valueImage);
        $storyupdate = Story::find($request->storyid);
        $storyupdate->update([
          'created_by'  =>Auth::User()->name,
          'foto'      =>$namefile,
          'deskripsi' =>$request->deskripsi,
          'status'    =>$request->status,
        ]);
      }
        return redirect('story')->with('success','data was successfully updated.');
    }

    public function deletestory(Request $request)
    {
      $deletestory = Story::find($request->idStory);
      // delete ( delete file )
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

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Story;
use App\Barang;
use App\Kategori;

class FstoryController extends Controller
{
    public function showstory()
    {
      $data = array(
        'page' => 'story',
        // paginate ( create page )
        'showstory' => Story::orderBy('created_at','desc')->where('status','Active')->paginate(3),
        // limit ( limit data )
        'newnessproduct' => Barang::orderBy('created_at','desc')->limit(3)->get(),
        'showcategory' => Kategori::all(),
      );

      return view('frontend.story.index',$data);
    }

    public function detailstory($idstory)
    {
      $data = array(
        'page' => 'story',
        'showstory' => Story::find($idstory)->first(),
      );

      return view('frontend.story.detailstory',$data);
    }
}

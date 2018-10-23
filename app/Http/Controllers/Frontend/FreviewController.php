<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Ulasan;
use Auth;

class FreviewController extends Controller
{
    public function viewreview()
    {
      $data = array(
        'showreview' => Ulasan::with('relationproduct')->where('kode_user',Auth::user()->id)->where('status','belum')->get(),
      );

      return view('frontend.mypurchase.review.index',$data);
    }

    public function addreview(Request $request)
    {
      $validatedData = $request->validate([
        'rating' => 'required',
       ]);
       $addreview = Ulasan::find($request->idrating);
       $addreview->kode_user = Auth::user()->id;
       $addreview->rating = $request->rating;
       $addreview->isi_ulasan = $request->description;
       $addreview->status = 'selesai';
       $addreview->save();

       return redirect('/review');
    }

    public function showreview()
    {
      $data = array(
        'showreview' => Ulasan::with('relationproduct')->where('kode_user',Auth::user()->id)->where('status','selesai')->get(),
      );

      return view('frontend.mypurchase.review.myreview',$data);
    }

    public function waitingreview()
    {
      $data = array(
        'showreview' => Ulasan::with('relationproduct')->where('kode_user',Auth::user()->id)->where('status','belum')->get(),
      );

      return view('frontend.mypurchase.review.waitingreview',$data);
    }
}

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
        // with ( relationships ) call funtion on model
        'showreview' => Ulasan::with('relationproduct')->where('kode_user',Auth::user()->kode_user)->where('status','belum')->get(),
      );

      return view('frontend.mypurchase.review.index',$data);
    }

    public function addreview(Request $request)
    {
      $validatedData = $request->validate([
        'rating' => 'required',
       ]);
       $addreview = Ulasan::find($request->idrating);
       $addreview->rating = $request->rating;
       $addreview->isi_ulasan = $request->description;
       $addreview->status = 'selesai';
       $addreview->save();

       return redirect('/review');
    }

    public function showreview()
    {
      $data = array(
        // with ( relationships ) call funtion on model
        'showreview' => Ulasan::with('relationproduct')->where('kode_user',Auth::user()->kode_user)->where('status','selesai')->get(),
      );

      return view('frontend.mypurchase.review.myreview',$data);
    }

    public function waitingreview()
    {
      $data = array(
        // with ( relationships ) call funtion on model
        'showreview' => Ulasan::with('relationproduct')->where('kode_user',Auth::user()->kode_user)->where('status','belum')->get(),
      );

      return view('frontend.mypurchase.review.waitingreview',$data);
    }
}

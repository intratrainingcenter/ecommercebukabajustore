<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Pemesanan;
use App\Retur;
use App\user;
use App\Barang;
use Carbon\Carbon;


class DashboardController extends Controller
{
    public function index()
    {
      $transactionSucces = pemesanan::where('status','received')->count();
      $transactionReturnSuccess = Retur::where('status','received')->count();
      $userMember = user::where('status','Active')->count();
      $countProduct = Barang::select(DB::raw('SUM(stok) as stok'))->first()->stok;

      $transactionReceived = Pemesanan::where('status','received')->get();

      $data = array(
    		'transactionSuccess' => $transactionSucces,
    		'transactionReturSuccess' => $transactionReturnSuccess,
    		'userMember' => $userMember,
    		'countProduct' => $countProduct,
        'transactionReceived' => $transactionReceived,
    		'page' => 'Dashboard',
    	);

      return view('backend.dashboard.index',$data);
    }

    public function nonactive()
    {
      if (Auth::user()->status == 'nonActive'){
          return view('/nonActive');
        }else {
          return redirect('/dashboard');
        }
    }

    public function gettransactionorder()
    {
      $gettransactionorder = Pemesanan::select(DB::raw('count(*) as countorder,status'))->groupBy('status')->orderBy('status','desc')->get();
      return $gettransactionorder; 
    }

     public function gettransactionretur()
    {
      $gettransactionretur = Retur::select(DB::raw('count(*) as countretur,status'))->groupBy('status')->orderBy('status','desc')->get();
      return $gettransactionretur; 
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Pemesanan;
use App\Retur;
use App\user;
use App\Barang;

class DashboardController extends Controller
{
    public function index()
    {
      $transactionSucces = pemesanan::where('status','received')->count();
      $transactionReturnSuccess = Retur::where('status','received')->count();
      $userMember = user::where('kode_jabatan','member')->count();
      $countProduct = Barang::select(DB::raw('SUM(stok) as stok'))->first()->stok;

    	$data = array(
    		'transactionSuccess' => $transactionSucces,
    		'transactionReturSuccess' => $transactionReturnSuccess,
    		'userMember' => $userMember,
    		'countProduct' => $countProduct,
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

}

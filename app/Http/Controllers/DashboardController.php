<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$data = array(
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

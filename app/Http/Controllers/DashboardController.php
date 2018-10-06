<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}

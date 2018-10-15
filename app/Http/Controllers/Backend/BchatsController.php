<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BchatsController extends Controller
{
    public function index()
    {
    	$data = array(
    		'page' => 'chats',
    	);

    	return view('backend.chats.index',$data);
    }
}

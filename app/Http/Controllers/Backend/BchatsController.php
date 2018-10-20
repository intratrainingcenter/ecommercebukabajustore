<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class BchatsController extends Controller
{
    public function index()
    {
    	$data = array(
    		'page' => 'chats',
    	);

    	return view('backend.chats.index',$data);
    }

    public function User()
    {
      return response()->json(User::all());
    }
}

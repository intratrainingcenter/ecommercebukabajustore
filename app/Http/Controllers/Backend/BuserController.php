<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Jabatan;

class BuserController extends Controller
{
    public function index()
    {
      $data = array(
        'page'      =>'User',
        'user'      => User::all(),
        'position'  => Jabatan::all(),
      );
      return view('backend.user.index',$data);
    }

    public function userposition(Request $request)
    {
      dd($request->code);
      $position = Jabatana::where('kode_jabatan','=',$request->code)->get();
    }

    public function formadduser()
    {
      $select=[];
      $position = Jabatan::all();
      foreach ($position as $key ) {
        $select[$key->kode_jabatan] = $key->nama_jabatan;
      }
      $data = array(
        'page'      =>'User',
        'position'  =>$select,
      );
      return view('backend.user.formadduser',$data);
    }
}

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
      return view('backend.user.adduser',$data);
    }

    public function adduser(Request $request)
    {
      $date = date('Ymdhis');
      $createdirectory = Storage::makeDirectory('public/imageuser');
      $image = str_replace('data:image/png;base64,', '', $request->imageuser);
      $image = str_replace(' ','+',$image);
      $namefile = str_random(16).'.png';
      Storage::put('public/imageuser'.'/'.$namefile, base64_decode($image));
      $create = User::create([
         'kode_user'        => $date,
         'avatar'           => $namefile,
         'avatar_original'  => 'null',
         'provider_id'      => 'null',
         'provider'         => 'Auth',
         'lokasifoto'       => '/public/imageuser',
         'name'             => $request->name,
         'email'            => $request->email,
         'password'         => bcrypt($request->password),
         'kode_jabatan'     => $request->position,
         'alamat'           => $request->addres,
         'no_telp'          => $request->phonenumber,
         'jenis_kelamin'    => $request->gender,
         'status'           => 'Aktif',
      ]);
      return redirect('user')->with('add',$request->name);
    }

    public function detailuser($id)
    {
      $data = array(
        'page'        =>'User',
        'userdetail'  =>User::find($id),
      );
      return view('backend.user.detailuser',$data);
    }
}

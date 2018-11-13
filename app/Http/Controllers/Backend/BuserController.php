<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Jabatan;

class BuserController extends Controller
{
  public function index()
  {
    $data = array(
      'page'      =>'User',
      'user'      => User::with('position')->get(),
      'position'  => Jabatan::all(),
    );
    return view('backend.user.index',$data);
  }

  public function userposition(Request $request)
  {
    $position = User::where('kode_jabatan','=',$request->code)->get();
    return view('backend.user.filtertable',compact('position'));
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
    $validate = $request->validate([
      'imageuser' => 'required',
      'name' => 'required',
      'email' => 'required|unique:users,email',
      'password' => 'required',
      'addres' => 'required',
      'phonenumber' => 'required',
      'gender'    => 'required',
      'position'  => 'required',
    ]);
    $date = date('Ymdhis');
    $createdirectory = Storage::makeDirectory('public/imageuser');
    $image = str_replace('data:image/png;base64,', '', $request->imageuser);
    $image = str_replace(' ','+',$image);
    $namefile = str_random(16).'.png';
    Storage::put('public/imageuser'.'/'.$namefile, base64_decode($image));

// create code with position user
    if ($request->position == 'admin') {
      $prefixcode = 'ADMN-';
    }elseif($request->position == 'member') {
      $prefixcode = 'MB-';
    }else {
      $prefixcode = 'SPV-';
    }
    $create = User::create([
      'kode_user'        => $prefixcode.$date,
      'avatar'           => $namefile,
      'avatar_original'  => 'null',
      'provider_id'      => '',
      'provider'         => 'Auth',
      'lokasifoto'       => '/public/imageuser',
      'name'             => $request->name,
      'email'            => $request->email,
      'password'         => Hash::make($request->password),
      'kode_jabatan'     => $request->position,
      'alamat'           => $request->addres,
      'no_telp'          => $request->phonenumber,
      'jenis_kelamin'    => $request->gender,
      'status'           => 'Active',
    ]);
    return redirect('user')->with('success','data user '.$request->name.' was successfully added.');
  }

  public function formupdateuser($id)
  {
    $data = array(
      'page'    =>'User',
      'user'    =>User::find($id),
    );
    return view('backend.user.updateuser',$data);
  }

  public function updateuser(Request $request)
  {
    $validate = $request->validate([
      'name' => 'required',
      'email' => 'required|unique:users,email,'.$request->id,
      'addres' => 'required',
      'phonenumber' => 'required',
    ]);
    if ($request->imageuser == null) {

      $update = User::where('kode_user','=',$request->userid)->first();
      $update->update([
        'name'             => $request->name,
        'email'            => $request->email,
        'kode_jabatan'     => $request->position,
        'alamat'           => $request->addres,
        'no_telp'          => $request->phonenumber,
        'jenis_kelamin'    => $request->gender,
        'status'           => $request->status,
      ]);

    }else {
      $createdirectory = Storage::makeDirectory('public/imageuser');
      $image = str_replace('data:image/png;base64,', '', $request->imageuser);
      $image = str_replace(' ','+',$image);
      $namefile = str_random(16).'.png';
      Storage::delete('public/imageuser'.'/'.$request->avatar);
      Storage::put('public/imageuser'.'/'.$namefile, base64_decode($image));
      $update = User::where('kode_user','=',$request->userid)->first();
      $update->update([
        'avatar'           => $namefile,
        'name'             => $request->name,
        'email'            => $request->email,
        'kode_jabatan'     => $request->position,
        'alamat'           => $request->addres,
        'no_telp'          => $request->phonenumber,
        'jenis_kelamin'    => $request->gender,
        'status'           => $request->status,
      ]);
    }
    return redirect('user')->with('success','data user '.$request->name.' was successfully updated.');
  }

  public function deleteuser(Request $request)
  {
    $delete = User::find($request->iduser);
    Storage::delete('public/imageuser'.'/'.$delete->avatar);
    $delete->delete();

    return 'success';
  }

  public function detailuser($id)
  {
    $data = array(
      'page'        =>'User',
      'userdetail'  =>User::find($id),
    );
    return view('backend.user.detailuser',$data);
  }

  public function loaddatauser()
  {
    $user = User::with('position')->get();
    return view('backend.user.tabledatauser',compact('user'));
  }
}

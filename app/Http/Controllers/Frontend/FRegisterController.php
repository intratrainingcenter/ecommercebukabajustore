<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class FRegisterController extends Controller
{
  public function create (Request $request)
  {
    $validate = $request->validate([
      'name' => 'required',
      'email' => 'required|unique:users,email',
      'password' => 'required',
      'gender' => 'required',
      'phonenumber' => 'required',
    ]);
     $date = date('Ymdhis');
     User::create([
         'kode_user'         => 'MB-'.$date,
         'provider'          => 'Auth',
         'provider_id'       => '',
         'avatar'            => '',
         'avatar_original'   => '',
         'name'              => $request->name,
         'email'             => $request->email,
         'password'          => Hash::make($request->password),
         'jenis_kelamin'     => $request->gender,
         'lokasifoto'        => '/public/imageuser',
         'alamat'            => '',
         'kode_jabatan'      => 'member',
         'no_telp'           => $request->phonenumber,
         'status'            => 'Active',
     ]);
     return redirect('loginMember');
  }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class BprofileController extends Controller
{
  public function index()
   {
     $data = array(
       'page' => 'Profile',
     );

     return view('backend.profile.index',$data);
   }

  public function updateprofile(Request $request)
 {
   $updateuser = User::find(Auth::user()->id);
   if ($request->imageUser == true) {
     // makeDirectory ( create Directory )
     $createdirectory = Storage::makeDirectory('public/imageuser');
     // str_replace ( take string )
     $image = str_replace('data:image/png;base64,', '', $request->imageUser);
     $image = str_replace(' ','+',$image);
     // str_random ( create string random )
     $namefile = str_random(16).'.png';
     // put ( move )
     Storage::put('public/imageuser'.'/'.$namefile, base64_decode($image));
     // delete ( delete file )
     Storage::delete('public/imageuser'.'/'.$updateuser->avatar);
     $updateuser->avatar = $namefile;
   }

  if ($updateuser->email  !==  $request->email) {
    $validatedData = $request->validate([
      'email' => 'unique:users',
     ]);
     $updateuser->email == $request->email;
  }
  $updateuser->name = $request->name;
    $updateuser->alamat = $request->address;
    $updateuser->no_telp = $request->phone;
    $updateuser->jenis_kelamin = $request->gender;
  if ($request->password == true) {
    // Hash make ( secret password )
    $updateuser->password =  Hash::make($request->password);
  }
  $updateuser->save();

   return redirect('profile');
 }

}

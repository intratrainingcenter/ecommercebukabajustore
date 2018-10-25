<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class FprofileController extends Controller
{
    public function index()
   {
     $data = array(
       'page' => 'Profile',
     );

     return view('frontend.profile.index',$data);
   }

  public function updateprofile(Request $request)
 {
   $updateuser = User::find(Auth::user()->id);
   if ($request->imageProfile == true) {
     $createdirectory = Storage::makeDirectory('public/imageuser');
     $image = str_replace('data:image/png;base64,', '', $request->imageProfile);
     $image = str_replace(' ','+',$image);
     $namefile = str_random(16).'.png';
     Storage::put('public/imageuser'.'/'.$namefile, base64_decode($image));
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
  if ($request->password = true) {
    $updateuser->password = bcrypt($request->password);
  }
  $updateuser->save();

   return redirect()->route('profileIndex');
 }
}

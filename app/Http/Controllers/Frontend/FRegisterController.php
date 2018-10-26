<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Jobs\SendVerificationEmail;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

class FRegisterController extends Controller
{

  use RegistersUsers;
  protected $redirectTo = '/dashboard';


  protected function validator(array $data)
  {
      return Validator::make($data, [
          'name' => 'required',
          'email' => 'required|unique:users,email',
          'password' => 'required',
          'gender' => 'required',
          'phonenumber' => 'required',
      ]);
  }

  public function create(array $data)
  {
     $date = date('Ymdhis');
    return    User::create([
         'kode_user'         => 'MB-'.$date,
         'provider'          => 'Auth',
         'provider_id'       => '',
         'avatar'            => '',
         'avatar_original'   => '',
         'name'              => $data['name'],
         'email'             => $data['email'],
         'password'          => Hash::make($data['password']),
         'jenis_kelamin'     => $data['gender'],
         'lokasifoto'        => '/public/imageuser',
         'alamat'            => '',
         'kode_jabatan'      => 'member',
         'no_telp'           => $data['phonenumber'],
         'status'            => 'VerifyEmail',
         'email_token'       => base64_encode($data['email'])
     ]);
   }

    public function register(Request $request)
    {
    $this->validator($request->all())->validate();
    event(new Registered($user = $this->create($request->all())));
    dispatch(new SendVerificationEmail($user));
    return view('frontend.verifyemail.verification');
    }

    public function verify($token)
    {
    $user = User::where('email_token',$token)->first();
    $user->status = 'Active';
    if($user->save()){
    return view('frontend.verifyemail.emailconfirm',['user'=>$user]);
    }
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('registerAdmin');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'address' => 'required',
            'phoneNumber' => 'required',
            'gender' => 'required',
        ]);
    }

    protected function create(array $data)
    {
      $namefile = '';
        if ($data['imageUser']) {
        $createdirectory = Storage::makeDirectory('public/imageuser');
        $image = str_replace('data:image/png;base64,', '', $data['imageUser']);
        $image = str_replace(' ','+',$image);
        $namefile = str_random(16).'.png';
        Storage::put('public/imageuser'.'/'.$namefile, base64_decode($image));
      }

        return User::create([
            'avatar' => $namefile,
            'lokasifoto' => 'public/imageuser/',
            'kode_user' => 'ADMN-'.date('Ymdhis'),
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'alamat' => $data['address'],
            'no_telp' => $data['phoneNumber'],
            'jenis_kelamin' => $data['gender'],
            'kode_jabatan' => 'admin',
            'status' => 'Active',
        ]);
    }

     public function redirectToProvider($provider)
    {
      $data = Socialite::driver($provider)->redirect();
      return $data;
    }

     public function handleProviderCallback($provider)
    {
      $user = Socialite::driver($provider)->user();
      $email = $user->email;
      return view('frontend.Auth.registerSocialite',compact('email'));
    }
}

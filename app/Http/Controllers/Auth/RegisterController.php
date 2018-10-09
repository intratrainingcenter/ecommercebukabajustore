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
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('registerAdmin');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'alamat' => 'required',
            'no_telp' => 'required',
            'jenis_kelamin' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      $namefile = '';
        if ($data['image'] === true) {
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
            'alamat' => $data['alamat'],
            'no_telp' => $data['no_telp'],
            'jenis_kelamin' => $data['jenis_kelamin'],
            'kode_jabatan' => 'admin',
            'status' => 'non-aktif',
        ]);
    }
}

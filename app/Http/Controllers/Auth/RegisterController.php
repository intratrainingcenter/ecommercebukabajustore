<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('guest');
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
            'phonenumber' => 'required',
            'gender' => 'required',
            'password' => 'required|string|min:6|confirmed',
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
         $date = date('Ymdhis');
        return User::create([
            'kode_user'         => $date,
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
            'status'            => 'Active',
        ]);
    }

     public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    //  public function handleProviderCallback($provider)
    // {
    //     dd($provider);
    //     $user = Socialite::driver($provider)->user();
    //     $authUser = $this->findOrCreateUser($user, $provider);
    //     // Auth::login($authUser, true);
    //     // return redirect('/');
    // }
    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
            dd($user);
        // $authUser = User::where('provider_id', $user->id)->first();
        // if ($authUser) {
        //     return $authUser;
        // }
        // else{
        //     $date = date('Ymdhis');
        //     $data = User::create([
        //         'kode_user'         => $date,
        //         'name'              => $user->name,
        //         'email'             => !empty($user->email)? $user->email : '' ,
        //         'provider'          => $provider,
        //         'provider_id'       => $user->id,
        //         'password'          => bcrypt('member'),
        //         'avatar'            => $user->avatar,
        //         'avatar_original'   => $user->avatar_original,
        //         'lokasifoto'        => 'Socialite',
        //         'kode_jabatan'      => 'member',
        //         'alamat'            => '',
        //         'no_telp'           => '',
        //         'jenis_kelamin'     => '',
        //         'status'            => 'Active',
        //     ]);
        //     return $data;
        // }
    }
}

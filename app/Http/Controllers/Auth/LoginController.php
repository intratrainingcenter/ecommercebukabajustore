<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use Socialite;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        if (Auth::user()) {
          $this->middleware('verifyemail')->except('logout');;
        }
    }

    public function logout(Request $request)
    {
     if (Auth::user()->kode_jabatan === 'member' ){
       $this->guard()->logout();
       $request->session()->flush();
       $request->session()->regenerate();
       return redirect('/loginMember');
     }else{
       $this->guard()->logout();
       $request->session()->flush();
       $request->session()->regenerate();
       return redirect('/login');
     }
    }

    public function showLoginForm()
    {
    $useradmin = DB::table('users')->where('kode_jabatan','admin')->count();

     return view('auth.login',['useradmin'=>$useradmin]);
    }

     public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

     public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        if ($authUser == false) {
        return redirect('loginMember')->with('warning','WARNING!!!');
        }else{
        Auth::login($authUser, true);
        return redirect('/');
        }
    }

    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }else{

            $Check = User::where('email',$user->email)->first();
            if ($Check != null) {
            return false;
            }else{
            $date = date('Ymdhis');
            $data = User::create([
                'kode_user'         => 'MB-'.$date,
                'name'              => $user->name,
                'email'             => !empty($user->email)? $user->email : '' ,
                'provider'          => $provider,
                'provider_id'       => $user->id,
                'password'          => bcrypt('member'),
                'avatar'            => $user->avatar,
                'avatar_original'   => $user->avatar_original,
                'lokasifoto'        => 'Socialite',
                'kode_jabatan'      => 'member',
                'alamat'            => '',
                'no_telp'           => '',
                'jenis_kelamin'     => '',
                'status'            => 'Active',
            ]);
            return $data;
             }
        }
    }
}

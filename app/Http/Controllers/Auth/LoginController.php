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
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
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
    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
     public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();
        $authUser = $this->findOrCreateUser($user, $provider);
        Auth::login($authUser, true);
        return redirect('/');
    }
    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        $authUser = User::where('provider_id', $user->id)->first();
        if ($authUser) {
            return $authUser;
        }
        else{
            $date = date('Ymdhis');
            $data = User::create([
                'kode_user'         => $date,
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

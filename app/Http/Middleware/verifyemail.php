<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class verifyemail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
      $checkstatususer = User::where('email',$request->email)->first();
      dd(User::all());
      if ($checkstatususer->status == 'VerifyEmail') {
        return redirect('verifyemail');
      }
      return $next($request);

    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class backendAccess
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
      if (Auth::user()->kode_jabatan === 'admin' || Auth::user()->kode_jabatan === 'spv'){
              return $next($request);
            }else {
               return redirect('/');
            }
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class registerAdmin
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
      $useradmin = DB::table('users')->where('kode_jabatan','admin')->first();
      if ($useradmin === null){
        return $next($request);
      }else {
         return redirect('/login');
      }
    }
}

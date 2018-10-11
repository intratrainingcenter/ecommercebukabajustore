<?php

namespace App\Http\Middleware;

use Closure;
use App\setting;

class setup
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
      if (setting::count() >= 1) {
        return $next($request);
      }
      return redirect('setup');

    }
}

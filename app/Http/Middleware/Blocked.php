<?php

namespace App\Http\Middleware;

use Closure;

class Blocked
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
      if (auth()->user()->violations<=5) {
        return $next($request);
      }

      return redirect('/dashboard')->
      with('error','Your account is Blocked !');

    }
}

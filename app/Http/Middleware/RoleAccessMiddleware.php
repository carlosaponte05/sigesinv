<?php

namespace App\Http\Middleware;

use Closure;

class RoleAccessMiddleware
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
        $user = \Sentinel::check();

        if (isGod($user->user_id)) {
            return redirect()->to('/');
        } else {
          return $next($request);
        }
        
    }
}

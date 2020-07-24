<?php

namespace App\Http\Middleware;

use Closure;
use App\Attorney;
use Auth;

class verify
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
        
        if(Auth::user()->token == null){
            return $next($request);
        }
        return redirect('/email/verify-attorney');
    }
}

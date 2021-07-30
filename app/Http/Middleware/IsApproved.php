<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsApproved
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->is_approved == 1){
            return $next($request);
        }

        return redirect('unapproved')->with('error',"Your registration has not yet been approved by the Admin");
    }
}

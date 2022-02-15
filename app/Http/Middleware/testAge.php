<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class testAge
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
        //false

        if ($request->age <= 20) {
            return redirect('unauthorize');
        }


        return $next($request); //true
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckNastavnik
{
    public function handle(Request $request, Closure $next, $role)
    {
        if ($request->user() && $request->user()->role != $role) {
            return redirect('/home')->with('error', 'Nemate pristup ovoj stranici.');
        }

        return $next($request);
    }
}

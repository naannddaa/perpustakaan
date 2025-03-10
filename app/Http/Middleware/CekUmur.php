<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekUmur
{

    public function handle(Request $request, Closure $next, $role)
    {
        // if ($request->age <18) {
        //     return response()->json(['message' => 'akses ditolak!'], 403);
        // }
        if ($request->user()->role !== $role) {
            return response()->json(['message' => 'akses ditolak'], 403);
        }
        return $next($request);
    }

   

}

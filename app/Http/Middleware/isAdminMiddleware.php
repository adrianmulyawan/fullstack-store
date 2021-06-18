<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdminMiddleware
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
        // Jika di user dan user tsb memiliki role = ADMIN
        if (Auth::user() && Auth::user()->roles === 'ADMIN') {
            // Maka kita akan lanjutkan requestnya
            return $next($request);
        }
        // kita arahkan / redirect jika user yang login roles != ADMIN
        return redirect()->to('/');
    }

    // Setelah itu kita daftarkan middleware ini di Kernel.php 
}

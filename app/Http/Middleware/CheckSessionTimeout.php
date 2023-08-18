<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSessionTimeout
{
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user's session has expired
            if (time() - session('last_activity') > config('session.lifetime') * 1000) {
                Auth::logout(); // Log the user out
                return redirect()->route('login')->withErrors(['session_expired' => 'Your session has expired. Please log in again.']);
            }
            
            // Update the last activity time in session
            session(['last_activity' => time()]);
        }
        
        return $next($request);
    }
}

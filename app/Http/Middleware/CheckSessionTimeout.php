<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

// class CheckSessionTimeout
// {
//     public function handle($request, Closure $next)
//     {
//         if (Auth::guard('staff')->check()) {
//             // Check if the staff user's session has expired
//             if (time() - session('staff_last_activity') > config('session.lifetime') * 1000) {
//                 Auth::guard('staff')->logout(); // Log the staff user out
//                 return redirect()->route('staff.login')->withErrors(['session_expired' => 'Your session has expired. Please log in again.']);
//             }

//             // Update the staff user's last activity time in session
//             session(['staff_last_activity' => time()]);
//         } elseif (Auth::check()) {
//             // Check if the regular user's session has expired
//             if (time() - session('last_activity') > config('session.lifetime') * 1000) {
//                 Auth::logout(); // Log the regular user out
//                 return redirect()->route('login')->withErrors(['session_expired' => 'Your session has expired. Please log in again.']);
//             }

//             // Update the regular user's last activity time in session
//             session(['last_activity' => time()]);
//         }

//         return $next($request);
//     }
// }

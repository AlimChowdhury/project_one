<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Http\Request;

class EnsureProfileIsComplete
{

    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if ($user && (empty($user->profile_picture) || empty($user->phone) || empty($user->bio))) {
        
            if (!$request->is('profile/edit') ) {
                return redirect()->route('profile.edit')
                    ->with('warning', 'Please update your profile before continuing...');
            }
        }

        return $next($request);
    }

}

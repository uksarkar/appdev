<?php

namespace App\Http\Middleware;

use App\Events\UserActivityEvent;
use Closure;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

class UserLastActivity
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
        if(auth()->check()) {
            $expiresAt = Carbon::now()->addMinutes(5);
            Cache::put('user-is-online-' . auth()->user()->id, true, $expiresAt);
            $thisTime = Carbon::now();
            event(new UserActivityEvent(auth()->user(),$thisTime));
        }
        return $next($request);
    }
}

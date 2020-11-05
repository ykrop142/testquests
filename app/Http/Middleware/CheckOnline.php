<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Auth;
use Cache;
use DB;

class CheckOnline
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()) {
            $expiresAt = Carbon::now()->addMinutes(5);
            Cache::put('user-is-online-' . Auth::user()->id, true, $expiresAt);
            if(Auth::user()->isOnline()){
                DB::table("users")
                    ->where("id",Auth::user()->id)
                    ->update(["last_online_at"=>now()]);
            }
        }
        return $next($request);
    }
}

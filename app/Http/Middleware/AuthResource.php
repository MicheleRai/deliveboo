<?php

namespace App\Http\Middleware;

use App\Dish;
use App\User;
use Closure;

class AuthResource
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
        {
            if ($request->route('id')) {
                $dishes = Dish::find($request->route('id'));
                if ($dishes && $dishes->user_id != auth()->user()->id) {
                    return redirect('/');
                }
            }

            return $next($request);
        }
    }
}

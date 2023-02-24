<?php

namespace App\Http\Middleware;

use App\Order;
use Closure;

class OrderAuth
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
        if ($request->route('id')) {
            $orders = Order::find($request->route('id'));
            if ($orders && $orders->dish_id != auth()->user()->id) {
                return redirect('/');
            }
        }
        return $next($request);
    }
}

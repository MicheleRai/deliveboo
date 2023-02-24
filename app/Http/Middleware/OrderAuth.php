<?php

namespace App\Http\Middleware;

use App\Order;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

                return redirect('/');
            }
        }
        return $next($request);
    }
}

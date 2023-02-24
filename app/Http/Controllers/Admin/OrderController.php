<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::table('orders')
        ->select(DB::raw('COUNT(order_id) as numero_piatti, order_id, orders.address, orders.tot_price, orders.created_at'))
        ->join('dish_order','orders.id','=','dish_order.order_id')
        ->join('dishes','dish_id','=','dishes.id')
        ->where('user_id','=',Auth::user()->id)
        ->groupBy('order_id')
        ->get();

        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $search =
        DB::table("orders")
            ->join("dish_order", function($join){
                $join->on("orders.id", "=", "dish_order.order_id");
            })
            ->join("dishes", function($join){
                $join->on("dish_order.dish_id", "=", "dishes.id");
            })
            ->join("users", function($join){
                $join->on("dishes.user_id", "=", "users.id");
            })
            ->select("dishes.user_id")
            ->where("users.id", "=", Auth::user()->id)
            ->groupBy("users.id")
            ->get();
            $prova = $search[0]->user_id;
        // dd($search[0]->user_id);
        if(Auth::id() !== $prova){
            return view('auth.error')->withErrors('You cannot do that');
        } else{
        return view('admin.orders.show', compact('order'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}

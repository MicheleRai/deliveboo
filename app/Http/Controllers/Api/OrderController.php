<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $order = new Order();
        $order->name_user = $data['name_user'];
        $order->email_user = $data['email_user'];
        $order->address = $data['address'];
        $order->tot_price = $data['tot_price'];
        $order->save();

        //TODO: fare attach in dish_order

        return redirect()->route('order',
        [ 'order' => $order ]);
    }

    public function submit(Request $request) {
        $this->validate($request, [
            'name_user' => 'required|string|max:50',
            'email_user' => 'required|email|max:50',
            'address' => 'required|string|max:50',
            'tot_price' => 'required|numeric|between:0.00,9999.99',
        ]);

        $data = $request->all();

        $order = Order::create([
            'name_user' => $data['name_user'],
            'address' => $data['address'],
            'email_user' => $data['email_user'],
            'note' => $data['note'] ?? null,
            'tot_price' => $data['tot_price']
        ]);

        // TODO: aggiungere attach della tabella ponte
        // $user->categories()->sync($request['categories']);
        /*
          Add mail functionality here.
        */

        return response()->json($order, 200);
    }

}

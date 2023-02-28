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
        $order->dishes()->attach($request['dishes_id']);
        /*
          Add mail functionality here.
        */

        return response()->json($order, 200);
    }

}

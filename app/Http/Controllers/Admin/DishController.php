<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::where('user_id', Auth::user()->id)->get();
        // dd($dishes);

        return view('admin.dishes.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');
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

        $dish = new Dish();
        $dish->user_id = Auth::user()->id;
        $dish->name = $data['name'];
        $dish->price = $data['price'];
        $dish->description = $data['description'];
        $dish->visible = $request->has('visible');
        $dish->image = $data['image'];
        $dish->save();

        return redirect()->route('admin.dishes.show',
        [ 'dish' => $dish ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('admin.dishes.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $data = $request->all();

        $dish->user_id = Auth::user()->id;
        $dish->name = $data['name'];
        $dish->price = $data['price'];
        $dish->description = $data['description'];
        $dish->visible = $request->has('visible');
        $dish->image = $data['image'];
        $dish->update();

        return redirect()->route('admin.dishes.show',
        [ 'dish' => $dish ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->orders()->detach();
        $dish->delete();
        return redirect()->route('admin.dishes.index');
    }
}

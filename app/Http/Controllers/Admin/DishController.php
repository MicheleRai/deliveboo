<?php

namespace App\Http\Controllers\Admin;

use App\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    private $validations = [
        'name'        => 'required|max:50|string',
        'price'       => 'required|numeric|between:0.00,9999.99',
        'description' => 'required|string',
        'image'       => 'required|file|mimes:jpg,jpeg,png,gif,webp|max:1024',
    ];

    // TODO: cambiare il sistema di caricamento delle immagini

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tab = Dish::all();
        $dishes = Dish::where('user_id', Auth::user()->id)->get();
        // dd($dishes);

        return view('admin.dishes.index', compact('dishes', 'tab'));
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

        $request->validate($this->validations);
        $data = $request->all();

        $img_path = Storage::put('uploads', $data['image']);
        $dish = new Dish();
        $dish->user_id = Auth::user()->id;
        $dish->name = $data['name'];
        $dish->price = $data['price'];
        $dish->description = $data['description'];
        $dish->visible = $request->has('visible');
        $dish->image = $img_path;
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
        if(Auth::id() !== $dish->user_id){
            return view('auth.error');
        } else{
        return view('admin.dishes.show', compact('dish'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        if(Auth::id() !== $dish->user_id){
            return view('auth.error')->withErrors('You cannot do that');
        } else{
        return view('admin.dishes.edit', compact('dish'));
         }
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
        $request->validate($this->validations);
        $data = $request->all();

        $img_path = Storage::put('uploads', $data['image']);
        $dish->user_id = Auth::user()->id;
        $dish->name = $data['name'];
        $dish->price = $data['price'];
        $dish->description = $data['description'];
        $dish->visible = $request->has('visible');
        $dish->image = $img_path;
        $dish->save();

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

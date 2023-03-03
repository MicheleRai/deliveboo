<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Dish;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $categories = Category::all();

        return response()->json ([
            'success' => true,
            'results' => $users,
            'categories' => $categories,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show($dish)
    {
        $menu = User::where('slug', $dish)->first();

        $menu->dishes = Dish::where('user_id', $menu->id)->get();

        return response()->json ([
            'success' => true,
            'results' => $menu,
        ]);
    }

    public function categories($category)
    {
        $category = Category::where('slug', $category)->first();
        $restaurants = $category->users()->get();

        return response()->json ([
            'success' => true,
            'results' => $category,
            'restaurants' => $restaurants,
        ]);
    }

    public function paginate()
    {
        $users = User::limit(6)->get();
        $categories = Category::all();

        return response()->json ([
            'success' => true,
            'results' => $users,
            'categories' => $categories,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $categories = Category::all();
        return view('admin.home', [
            'user' => $user,
            'categories' => $categories
        ]);
    }

    public function profileUpdate(Request $request){
        //validation rules

        $request->validate([
            'name' => 'required|string|max:50',
            'address' => 'required|string|max:50',
            'vat_number' => 'required|numeric|digits:11',
            'logo_image' => 'required|file|mimes:jpg,jpeg,png,gif|max:1024',
            'cover_image' => 'required|file|mimes:jpg,jpeg,png,gif|max:1024',
        ]);

        $logo_path = Storage::put('uploads', $request['logo_image']);
        $cover_path = Storage::put('uploads', $request['cover_image']);

        $user = Auth::user();
        $user->name = $request['name'];
        $user->address = $request['address'];
        $user->vat_number = $request['vat_number'];
        $user->logo_image = $logo_path;
        $user->cover_image = $cover_path;
        $user->slug = User::getSlug($request['name']);
        $user->save();
        $user->categories()->sync($request['categories']);

        return back()->with('message','Profilo Aggiornato');
    }
    public function show(User $user)
    {
        $categories = DB::table('users')
            ->select('*')
            ->join('category_user','users.id','=','category_user.user_id')
            ->join('categories','category_user.category_id','=','categories.id')
            ->where('users.id','=',Auth::user()->id)
            ->get();
        return view('admin.dashboard', compact('categories'));

    }
}

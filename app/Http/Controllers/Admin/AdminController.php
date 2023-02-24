<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $categories = Category::all();
        return view('admin.home', compact('categories'));
    }

    public function profileUpdate(Request $request){
        //validation rules

        $request->validate([
            'name' => 'required|string|max:50',
            'address' => 'required|string|max:50',
            'vat_number' => 'required|numeric|digits:11',
            'logo_image' => 'string',
            'cover_image' => 'string',
        ]);

        // TODO: save changes
        $user = Auth::user();
        $user->name = $request['name'];
        $user->address = $request['address'];
        $user->vat_number = $request['vat_number'];
        $user->logo_image = $request['logo_image'];
        $user->cover_image = $request['cover_image'];
        $user->slug = $request[User::getSlug('name')];
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

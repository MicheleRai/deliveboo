<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        return view('admin.home');
    }

    public function profileUpdate(Request $request){
        //validation rules

        $request->validate([
            'name' => 'required|string|max:50',
            'address' => 'required|string|max:50',
            'vat_number' => 'required|numeric|max:99999999999',
            'logo_image' => 'string',
            'cover_image' => 'string',
        ]);

        // TODO: save changes
        $user =Auth::user();
        $user->name = $request['name'];
        $user->address = $request['address'];
        $user->vat_number = $request['vat_number'];
        $user->logo_image = $request['logo_image'];
        $user->cover_image = $request['cover_image'];
        $user->slug = $request[User::getSlug('name')];
        $user->save();

        return back()->with('message','Profile Updated');
    }
}

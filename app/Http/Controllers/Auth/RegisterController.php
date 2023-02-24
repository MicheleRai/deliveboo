<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Category;
use App\Traits\Slugger;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    public function showRegistrationForm() {
        $categories = Category::all();
        return view('auth.register', compact('categories'));
    }

    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:50'],
            'address' => ['required', 'string', 'max:50'],
            'vat_number' => ['required', 'numeric', 'digits:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'logo_image' => ['image', 'max:1024'],
            'cover_image' => ['image', 'max:1024'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // if(request()->hasfile('logo_image')){
        //     $logo_path = time().'.'.request()->logo_image->getClientOriginalExtension();
        //     request()->logo_image->move(public_path('uploads'), $logo_path);
        // }
        // if(request()->hasfile('cover_image')){
        //     $cover_path = time().'.'.request()->avatar->getClientOriginalExtension();
        //     request()->avatar->move(public_path('uploads'), $cover_path);
        // }

        $logo_path = Storage::put('uploads', $data['logo_image']);
        $cover_path = Storage::put('uploads', $data['cover_image']);

        $user = User::create([
            'slug' => User::getSlug($data['name']),
            'name' => $data['name'],
            'address' => $data['address'],
            'vat_number' => $data['vat_number'],
            'email' => $data['email'],
            'logo_image' => $logo_path ?? NULL,
            'cover_image' => $cover_path ?? NULL,
            'password' => Hash::make($data['password']),
        ]);

        $user->categories()->attach($data['categories']);

        return $user;
    }
}

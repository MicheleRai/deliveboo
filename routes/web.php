<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');

Auth::routes();

Route::get('/', function () {
    return view('guest.home');
});


Route::middleware('auth')
->namespace('Admin')
->name('admin.')
->prefix('admin')
->group(function () {
    Route::get('/', 'AdminController@index')->name('home');
    Route::post('/','AdminController@profileUpdate')->name('profileupdate'); //TODO:
    Route::resource('dishes', 'DishController');
    Route::resource('orders', 'OrderController');
});



<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BraintreeController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/dishes', 'Api\DishController@index')->name('dishes.index');
Route::get('/dishes/{dish}', 'Api\DishController@show')->name('dishes.show');

Route::post('/order', 'Api\OrderController@create')->name('order.create');

Route::any('/payment', [BraintreeController::class, 'token'])->name('token')->middleware('auth');

<?php

use Illuminate\Http\Request;
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

// Route::get('/', function () {
//     return view('guest.home');
// });


Route::middleware('auth')
->namespace('Admin')
->name('admin.')
->prefix('admin')
->group(function () {
    Route::get('/', 'AdminController@index')->name('home');
    Route::post('/','AdminController@profileUpdate')->name('profileupdate'); //TODO:
    Route::resource('dishes', 'DishController');
    Route::resource('orders', 'OrderController');
    Route::get('/dashboard', 'AdminController@show')->name('dashboard');
});

Route::get('/payment/checkout', function () {
    //genero oggetto gateway con i parametri del mio account Braintree presi da env
    $gateway = new Braintree\Gateway([
      'environment' => config('services.braintree.environment'),
      'merchantId' => config('services.braintree.merchantId'),
      'publicKey' => config('services.braintree.publicKey'),
      'privateKey' => config('services.braintree.privateKey')
    ]);


    $token = $gateway->ClientToken()->generate();

    return response()->json($token);
  })->name("checkout");

Route::post('/payment/checkout', function (Request $request) {

    $gateway = new Braintree\Gateway([
      'environment' => config('services.braintree.environment'),
      'merchantId' => config('services.braintree.merchantId'),
      'publicKey' => config('services.braintree.publicKey'),
      'privateKey' => config('services.braintree.privateKey')
    ]);

    $nonce = $request->payment_method_nonce;
    $amount = $request->amount;


    $result = $gateway->transaction()->sale([
        'amount' => $amount,
        'paymentMethodNonce' => $nonce,
        'options' => [
            'submitForSettlement' => true
      ]
    ]);

    if ($result->success) {
      $transaction = $result->transaction;
      // header("Location: transaction.php?id=" . $transaction->id);

      // return back()->with('success_message', 'Transaction successful. The ID is:' . $transaction->id);
      return response()->json($transaction->id);
    } else {
      $errorString = "";

      foreach ($result->errors->deepAll() as $error) {
        $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
      }

      // return back()->withErrors('An error occurred with the message: ' . $result->message);
      return response()->json($result->message);
    }
  });

  Route::get('{any?}', function (){
    return view('guest.home');
})->where("any", ".*")->name('guest.home');



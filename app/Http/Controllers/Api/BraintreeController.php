<?php

namespace App\Http\Controllers\Api;

use Braintree\Gateway;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BraintreeController extends Controller
{
    public function token(Request $request){

        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'hp3cmvfqtnngydmx',
            'publicKey' => 'xrs77f2scj2qt7nb',
            'privateKey' => '2ff9ea6b0d4b7d7e297790a839d7a2c8'
          ]);

          $clientToken = $gateway->clientToken()->generate();

        return response()->json([
            'success' => true,
            'token' => $clientToken,
        ]);
    }
}

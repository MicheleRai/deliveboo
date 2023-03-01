<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $gateway = new Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'hp3cmvfqtnngydmx',
            'publicKey' => 'xrs77f2scj2qt7nb',
            'privateKey' => '2ff9ea6b0d4b7d7e297790a839d7a2c8'
          ]);
    }
}

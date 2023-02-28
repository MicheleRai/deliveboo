<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $gateway = new \Braintree\Gateway([
            'environment' => 'sandbox',
            'merchantId' => 'w5m36xynkkm7www2',
            'publicKey' => 'kt3vck39v49vqygt',
            'privateKey' => 'fde295d4425f0538557cd6f2fed10266'
        ]);
    }
}

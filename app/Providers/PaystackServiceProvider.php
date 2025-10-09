<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
 
 
use App\Services\PaystackService;

class PaystackServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton('paystack-wrapper', function ($app) {
            return new PaystackService();
        });
    }

    public function boot(): void
    {
        //
    }
}

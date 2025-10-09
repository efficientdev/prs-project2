<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Mail\MailManager;
use App\Mail\Transports\ZohoApiTransport;
use GuzzleHttp\Client;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        app(MailManager::class)->extend('zohoapi', function () {
            return new ZohoApiTransport(
                new Client(),
                config('services.zoho.token'),
                config('services.zoho.from')
            );
        });
    }
}

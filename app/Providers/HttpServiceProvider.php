<?php

namespace App\Providers;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class HttpServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        /**
         * Configure the Http client with the Uzum REST API settings.
         *
         * @mixin PendingRequest
         */
        Http::macro('uzumRest', fn() => Http::baseUrl(config('uzum.base_url'))
            ->withHeaders([
                'Accept-Language' => config('uzum.lang.current'),
                'Authorization' => config('uzum.auth_type') . ' ' . config('uzum.auth_token')
            ])
            ->acceptJson()
            ->throw()
            ->retry(config('uzum.max-retry'), config('uzum.sleep'))
        );

        /**
         * Configure the Http client with the Uzum GraphQL API settings.
         *
         * @mixin PendingRequest
         */
        Http::macro('uzumGraphql', fn() => Http::baseUrl(config('uzum.graphql_server'))
            ->withHeaders([
                'Accept-Language' => config('uzum.lang.current'),
                'Authorization' => config('uzum.auth_type') . ' ' . config('uzum.auth_token'),
                'x-iid' => config('uzum.x-iid')
            ])
            ->acceptJson()
            ->throw()
            ->retry(config('uzum.max-retry'), config('uzum.sleep'))
        );
    }
}

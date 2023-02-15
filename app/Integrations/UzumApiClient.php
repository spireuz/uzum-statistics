<?php

namespace App\Integrations;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class UzumApiClient
{
    const RETRY = 2;
    const SLEEP = 1000;

    public function __construct(private PendingRequest $request)
    {
        $this->request = Http::baseUrl(config('services.uzum.base_url'))
            ->withHeaders([
                'authorization' => sprintf(
                    '%s %s',
                    config('services.uzum.auth_type'),
                    config('services.uzum.auth_token')
                ),
                'Accept-Language' => 'uz-UZ'
            ])
            ->acceptJson()
            ->throw()
            ->retry(self::RETRY, self::SLEEP);
    }

    public function getCities(): array
    {
        return $this->request->get('main/cities')->json('payload');
    }
}

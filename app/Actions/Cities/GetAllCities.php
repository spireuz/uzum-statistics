<?php

namespace App\Actions\Cities;

use App\Integrations\ApiClient;

readonly class GetAllCities
{
    public function __construct(private ApiClient $apiClient)
    {
    }

    public function handle(): array
    {
        return $this->apiClient->getCities();
    }
}

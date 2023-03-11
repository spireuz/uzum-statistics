<?php

namespace App\Actions\Categories;

use App\Integrations\ApiClient;

readonly class GetCategories
{
    public function __construct(private ApiClient $apiClient)
    {
    }

    public function handle(): array
    {
        return $this->apiClient->getCategories();
    }
}

<?php

namespace App\Actions\Products;

use App\Integrations\ApiClient;

readonly class GetProductActionBanner
{
    public function __construct(private ApiClient $apiClient)
    {
    }

    public function handle(int $productId): array
    {
        return $this->apiClient->getProductActionBanner($productId);
    }
}

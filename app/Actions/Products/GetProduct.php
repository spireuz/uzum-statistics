<?php

namespace App\Actions\Products;

use App\Integrations\ApiClient;

readonly class GetProduct
{
    public function __construct(private ApiClient $apiClient)
    {
    }

    public function handle(int $productId): array
    {
        return $this->apiClient->getProduct($productId);
    }
}

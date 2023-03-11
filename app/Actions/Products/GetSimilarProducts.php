<?php

namespace App\Actions\Products;

use App\Integrations\ApiClient;

readonly class GetSimilarProducts
{
    public function __construct(private ApiClient $apiClient)
    {
    }

    public function handle(int $productId, array $params): array
    {
        return $this->apiClient->getSimilarProducts($productId, $params);
    }
}

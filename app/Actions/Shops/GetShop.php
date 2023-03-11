<?php

namespace App\Actions\Shops;

use App\Integrations\ApiClient;

readonly class GetShop
{
    public function __construct(private ApiClient $apiClient)
    {
    }

    public function handle(string $shopName): array
    {
        return $this->apiClient->getShopInfo($shopName);
    }
}

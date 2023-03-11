<?php

namespace App\Actions\Delivery;

use App\Integrations\ApiClient;

readonly class GetDeliveryPrice
{
    public function __construct(private ApiClient $apiClient)
    {
    }

    public function handle(int $cityId): array
    {
        return $this->apiClient->getDeliveryPrice($cityId);
    }
}

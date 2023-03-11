<?php

namespace App\Actions\Delivery;

use App\Integrations\ApiClient;

readonly class GetDeliveryTime
{
    public function __construct(private ApiClient $apiClient)
    {
    }

    public function handle(array $data): array
    {
        return $this->apiClient->getDeliveryTime($data);
    }
}

<?php

namespace App\Http\Controllers\Api\Shops;

use App\Http\Controllers\Api\BaseApiController;
use App\Integrations\UzumApiClient;
use Illuminate\Http\JsonResponse;

class GetShopInfoController extends BaseApiController
{
    public function __construct(private readonly UzumApiClient $apiClient)
    {
    }

    public function __invoke(string $shopName): JsonResponse
    {
        $shopInfo = $this->apiClient->getShopInfo($shopName);

        return $this->respondWithData($shopInfo);
    }
}

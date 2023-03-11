<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Api\BaseApiController;
use App\Integrations\ApiClient;
use Illuminate\Http\JsonResponse;

class GetProductActionBannerController extends BaseApiController
{
    public function __construct(private readonly ApiClient $apiClient)
    {
    }

    public function __invoke(int $productId): JsonResponse
    {
        $actionBanner = $this->apiClient->getProductActionBanner($productId);

        return $this->respondWithData($actionBanner);
    }
}

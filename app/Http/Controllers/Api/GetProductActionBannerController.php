<?php

namespace App\Http\Controllers\Api;

use App\Integrations\UzumApiClient;
use Illuminate\Http\JsonResponse;

class GetProductActionBannerController extends BaseApiController
{
    public function __construct(private readonly UzumApiClient $apiClient)
    {
    }

    public function __invoke(int $productId): JsonResponse
    {
        $actionBanner = $this->apiClient->getProductActionBanner($productId);

        return $this->respondWithData($actionBanner);
    }
}

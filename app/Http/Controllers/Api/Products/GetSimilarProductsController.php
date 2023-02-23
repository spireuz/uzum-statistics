<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\Products\GetSimilarProductsRequest;
use App\Integrations\UzumApiClient;
use Illuminate\Http\JsonResponse;

class GetSimilarProductsController extends BaseApiController
{
    public function __construct(
        private readonly UzumApiClient $apiClient
    ) {
    }

    public function __invoke(
        GetSimilarProductsRequest $request,
        int $productID
    ): JsonResponse {
        $params = $request->toDTO();
        $similarProducts = $this->apiClient->getSimilarProducts($productID, $params);

        return $this->respondWithData($similarProducts);
    }
}

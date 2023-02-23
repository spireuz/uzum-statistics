<?php

namespace App\Http\Controllers\Api\Products;

use App\Http\Controllers\Api\BaseApiController;
use App\Integrations\Uzum\UzumApiClient;
use Illuminate\Http\JsonResponse;

class GetProductController extends BaseApiController
{
    public function __construct(private readonly UzumApiClient $apiClient)
    {
    }

    public function __invoke(int $productId): JsonResponse
    {
        $product = $this->apiClient->getProduct($productId);

        return $this->respondWithData($product);
    }
}

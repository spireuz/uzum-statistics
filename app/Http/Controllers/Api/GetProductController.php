<?php

namespace App\Http\Controllers\Api;

use App\Integrations\UzumApiClient;
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

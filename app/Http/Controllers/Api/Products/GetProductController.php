<?php

namespace App\Http\Controllers\Api\Products;

use App\Actions\Products\GetProduct;
use App\Http\Controllers\Api\BaseApiController;
use Illuminate\Http\JsonResponse;

class GetProductController extends BaseApiController
{
    public function __invoke(int $productId, GetProduct $getProduct): JsonResponse
    {
        $product = $getProduct->handle($productId);

        return $this->respondWithData($product);
    }
}

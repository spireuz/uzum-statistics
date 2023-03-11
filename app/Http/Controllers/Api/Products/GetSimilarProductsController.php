<?php

namespace App\Http\Controllers\Api\Products;

use App\Actions\Products\GetSimilarProducts;
use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\Products\GetSimilarProductsRequest;
use Illuminate\Http\JsonResponse;

class GetSimilarProductsController extends BaseApiController
{
    public function __invoke(
        GetSimilarProductsRequest $request,
        int $productId,
        GetSimilarProducts $getSimilarProducts
    ): JsonResponse {
        $similarProducts = $getSimilarProducts->handle($productId, $request->toDTO());

        return $this->respondWithData($similarProducts);
    }
}

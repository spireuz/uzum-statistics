<?php

namespace App\Http\Controllers\Api\Products;

use App\Actions\Products\GetProductReviews;
use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\Products\GetProductReviewsRequest;
use Illuminate\Http\JsonResponse;

class GetProductReviewsController extends BaseApiController
{
    public function __invoke(
        GetProductReviewsRequest $request,
        int $productId,
        GetProductReviews $getProductReviews
    ): JsonResponse {
        $reviews = $getProductReviews->handle($productId, $request->toDTO());

        return $this->respondWithData($reviews);
    }
}

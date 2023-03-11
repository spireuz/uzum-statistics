<?php

namespace App\Http\Controllers\Api\Products;

use App\Actions\Products\GetProductActionBanner;
use App\Http\Controllers\Api\BaseApiController;
use Illuminate\Http\JsonResponse;

class GetProductActionBannerController extends BaseApiController
{
    public function __invoke(
        int $productId,
        GetProductActionBanner $getProductActionBanner
    ): JsonResponse {
        $actionBanner = $getProductActionBanner->handle($productId);

        return $this->respondWithData($actionBanner);
    }
}

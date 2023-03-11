<?php

namespace App\Http\Controllers\Api\Shops;

use App\Actions\Shops\GetShop;
use App\Http\Controllers\Api\BaseApiController;
use Illuminate\Http\JsonResponse;

class GetShopInfoController extends BaseApiController
{
    public function __invoke(string $shopName, GetShop $getShop): JsonResponse
    {
        $shopInfo = $getShop->handle($shopName);

        return $this->respondWithData($shopInfo);
    }
}

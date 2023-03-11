<?php

namespace App\Http\Controllers\Api\Delivery;

use App\Actions\Delivery\GetDeliveryPrice;
use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\Delivery\GetDeliveryPriceRequest;
use Illuminate\Http\JsonResponse;

class GetDeliveryPriceController extends BaseApiController
{
    public function __invoke(
        GetDeliveryPriceRequest $request,
        GetDeliveryPrice $getDeliveryPrice
    ): JsonResponse {
        $deliveryPrice = $getDeliveryPrice->handle($request->input('cityId'));

        return $this->respondWithData($deliveryPrice);
    }
}

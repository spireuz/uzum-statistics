<?php

namespace App\Http\Controllers\Api\Delivery;

use App\Actions\Delivery\GetDeliveryTime;
use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\Delivery\GetDeliveryTimeRequest;
use Illuminate\Http\JsonResponse;

class GetDeliveryTimeController extends BaseApiController
{
    public function __invoke(
        GetDeliveryTimeRequest $request,
        GetDeliveryTime $getDeliveryTime
    ): JsonResponse {
        $deliveryTime = $getDeliveryTime->handle($request->toDTO());

        return $this->respondWithData($deliveryTime);
    }
}

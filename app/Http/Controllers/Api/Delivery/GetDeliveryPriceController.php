<?php

namespace App\Http\Controllers\Api\Delivery;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\Delivery\GetDeliveryPriceRequest;
use App\Integrations\ApiClient;
use Illuminate\Http\JsonResponse;

class GetDeliveryPriceController extends BaseApiController
{
    public function __construct(private readonly ApiClient $apiClient)
    {
    }

    public function __invoke(GetDeliveryPriceRequest $request): JsonResponse
    {
        $cityId = $request->input('cityId');
        $deliveryPrice = $this->apiClient->getDeliveryPrice($cityId);

        return $this->respondWithData($deliveryPrice);
    }
}

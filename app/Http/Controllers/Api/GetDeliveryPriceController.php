<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\GetDeliveryPriceRequest;
use App\Integrations\UzumApiClient;
use Illuminate\Http\JsonResponse;

class GetDeliveryPriceController extends BaseApiController
{
    public function __construct(private readonly UzumApiClient $apiClient)
    {
    }

    public function __invoke(GetDeliveryPriceRequest $request): JsonResponse
    {
        $cityId = $request->input('cityId');
        $deliveryPrice = $this->apiClient->getDeliveryPrice($cityId);

        return $this->responseWithData($deliveryPrice);
    }
}

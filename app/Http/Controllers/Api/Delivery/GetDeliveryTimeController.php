<?php

namespace App\Http\Controllers\Api\Delivery;

use App\Http\Controllers\Api\BaseApiController;
use App\Http\Requests\Api\Delivery\GetDeliveryTimeRequest;
use App\Integrations\UzumApiClient;
use Illuminate\Http\JsonResponse;

class GetDeliveryTimeController extends BaseApiController
{
    public function __construct(private readonly UzumApiClient $apiClient)
    {
    }

    public function __invoke(GetDeliveryTimeRequest $request): JsonResponse
    {
        $data = $request->toDTO();
        $deliveryTime = $this->apiClient->getDeliveryTime($data);

        return $this->respondWithData($deliveryTime);
    }
}

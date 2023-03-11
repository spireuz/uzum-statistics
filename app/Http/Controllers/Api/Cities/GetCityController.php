<?php

namespace App\Http\Controllers\Api\Cities;

use App\Http\Controllers\Api\BaseApiController;
use App\Integrations\ApiClient;
use Illuminate\Http\JsonResponse;

class GetCityController extends BaseApiController
{
    public function __construct(private readonly ApiClient $apiClient)
    {
    }

    public function __invoke(): JsonResponse
    {
        $city = $this->apiClient->getCity();

        return $this->respondWithData($city);
    }
}

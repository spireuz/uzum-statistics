<?php

namespace App\Http\Controllers\Api\Cities;

use App\Http\Controllers\Api\BaseApiController;
use App\Integrations\ApiClient;
use Illuminate\Http\JsonResponse;

class GetCitiesController extends BaseApiController
{
    public function __construct(private readonly ApiClient $apiClient)
    {
    }

    public function __invoke(): JsonResponse
    {
        $cities = $this->apiClient->getCities();

        return $this->respondWithData($cities);
    }
}

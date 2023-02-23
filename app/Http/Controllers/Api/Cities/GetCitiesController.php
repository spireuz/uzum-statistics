<?php

namespace App\Http\Controllers\Api\Cities;

use App\Http\Controllers\Api\BaseApiController;
use App\Integrations\Uzum\UzumApiClient;
use Illuminate\Http\JsonResponse;

class GetCitiesController extends BaseApiController
{
    public function __construct(private readonly UzumApiClient $apiClient)
    {
    }

    public function __invoke(): JsonResponse
    {
        $cities = $this->apiClient->getCities();

        return $this->respondWithData($cities);
    }
}

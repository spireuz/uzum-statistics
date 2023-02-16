<?php

namespace App\Http\Controllers\Api;

use App\Integrations\UzumApiClient;
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

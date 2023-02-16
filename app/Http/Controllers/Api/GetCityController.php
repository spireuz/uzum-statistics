<?php

namespace App\Http\Controllers\Api;


use App\Integrations\UzumApiClient;
use Illuminate\Http\JsonResponse;

class GetCityController extends BaseApiController
{
    public function __construct(private readonly UzumApiClient $apiClient)
    {
    }

    public function __invoke(): JsonResponse
    {
        $city = $this->apiClient->getCity();

        return $this->respondWithData($city);
    }
}

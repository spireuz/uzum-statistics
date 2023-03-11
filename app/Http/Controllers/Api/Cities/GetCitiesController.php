<?php

namespace App\Http\Controllers\Api\Cities;

use App\Actions\Cities\GetAllCities;
use App\Http\Controllers\Api\BaseApiController;
use Illuminate\Http\JsonResponse;

class GetCitiesController extends BaseApiController
{
    public function __invoke(GetAllCities $getAllCities): JsonResponse
    {
        $cities = $getAllCities->handle();

        return $this->respondWithData($cities);
    }
}

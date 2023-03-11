<?php

namespace App\Http\Controllers\Api\Cities;

use App\Actions\Cities\GetCity;
use App\Http\Controllers\Api\BaseApiController;
use Illuminate\Http\JsonResponse;

class GetCityController extends BaseApiController
{
    public function __invoke(GetCity $getCity): JsonResponse
    {
        $city = $getCity->handle();

        return $this->respondWithData($city);
    }
}

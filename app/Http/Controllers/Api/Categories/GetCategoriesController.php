<?php

namespace App\Http\Controllers\Api\Categories;

use App\Actions\Categories\GetCategories;
use App\Http\Controllers\Api\BaseApiController;
use Illuminate\Http\JsonResponse;

class GetCategoriesController extends BaseApiController
{
    public function __invoke(GetCategories $getCategories): JsonResponse
    {
        $categories = $getCategories->handle();

        return $this->respondWithData($categories);
    }
}

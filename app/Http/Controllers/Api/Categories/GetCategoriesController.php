<?php

namespace App\Http\Controllers\Api\Categories;

use App\Http\Controllers\Api\BaseApiController;
use App\Integrations\ApiClient;
use Illuminate\Http\JsonResponse;

class GetCategoriesController extends BaseApiController
{
    public function __construct(private readonly ApiClient $apiClient)
    {
    }

    public function __invoke(): JsonResponse
    {
        $categories = $this->apiClient->getCategories();

        return $this->respondWithData($categories);
    }
}

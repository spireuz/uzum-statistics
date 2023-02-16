<?php

namespace App\Http\Controllers\Api;

use App\Integrations\UzumApiClient;
use Illuminate\Http\JsonResponse;

class GetCategoriesController extends BaseApiController
{
    public function __construct(private readonly UzumApiClient $apiClient)
    {
    }

    public function __invoke(): JsonResponse
    {
        $categories = $this->apiClient->getCategories();

        return $this->respondWithData($categories);
    }
}

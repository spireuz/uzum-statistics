<?php

namespace App\Http\Controllers\Api;

use App\Integrations\Uzum\UzumGraphqlClient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SearchController extends BaseApiController
{
    public function __construct(private readonly UzumGraphqlClient $graphqlClient)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $searchResults = $this->graphqlClient->search();

        return $this->respondWithData($searchResults);
    }
}

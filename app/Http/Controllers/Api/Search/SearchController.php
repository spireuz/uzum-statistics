<?php

namespace App\Http\Controllers\Api\Search;

use App\Actions\Search\GetSearchResult;
use App\Http\Controllers\Api\BaseApiController;
use Illuminate\Http\JsonResponse;

class SearchController extends BaseApiController
{
    public function __invoke(GetSearchResult $getSearchResult): JsonResponse
    {
        $searchResults = $getSearchResult->handle();

        return $this->respondWithData($searchResults);
    }
}

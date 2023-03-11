<?php

namespace App\Actions\Search;

use App\Integrations\GraphqlClient;

readonly class GetSearchResult
{
    public function __construct(private GraphqlClient $graphqlClient)
    {
    }

    public function handle(): ?array
    {
        return $this->graphqlClient->search();
    }
}

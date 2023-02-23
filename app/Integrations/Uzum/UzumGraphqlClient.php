<?php

namespace App\Integrations\Uzum;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class UzumGraphqlClient
{
    public function __construct(private PendingRequest $request)
    {
        $this->request = Http::baseUrl(config('uzum.graphql_server'))
            ->withHeaders([
                'Accept-Language' => config('uzum.lang.current'),
                'Authorization' => sprintf(
                    '%s %s',
                    config('uzum.auth_type'),
                    config('uzum.auth_token')
                ),
                'x-iid' => config('uzum.x-iid')
            ])
            ->acceptJson()
            ->throw()
            ->retry(
                config('uzum.max-retry'),
                config('uzum.sleep')
            );
    }

    private function buildQuery(array $variables): array
    {
        $query = 'query getMakeSearch($queryInput: MakeSearchQueryInput!) {
              makeSearch(query: $queryInput) {
                id
                queryId
                queryText
                category {
                  ...CategoryShortFragment
                }
                items {
                  catalogCard {
                    ...SkuGroupCardFragment
                  }
                }
                total
                mayHaveAdultContent
              }
            }

            fragment CategoryShortFragment on Category {
              id
              parent {
                id
                title
              }
              title
            }

            fragment SkuGroupCardFragment on SkuGroupCard {
              adult
              favorite
              feedbackQuantity
              id
              minFullPrice
              minSellPrice
              ordersQuantity
              productId
              rating
              title
              photos {
                key
                link(trans: PRODUCT_540) {
                  high
                  low
                }
              }
            }';

        return [
            'operationName' => 'getMakeSearch',
            'variables' => [
                'queryInput' => $variables
            ],
            'query' => $query
        ];
    }

    public function search(): ?array
    {
        $params = $this->buildQuery([
            "categoryId" => 10020,
            "shopId" => 730,
            "text" => "iphone",
            "showAdultContent" => "TRUE",
            "filters" => [],
            "sort" => "BY_ORDERS_NUMBER_DESC",
            "pagination" => [
                "offset" => 0,
                "limit" => 100
            ]
        ]);

        return $this->request->post('/', $params)->json('data.makeSearch');
    }
}

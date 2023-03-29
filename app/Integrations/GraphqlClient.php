<?php

namespace App\Integrations;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class GraphqlClient
{
    public function __construct(private PendingRequest $request)
    {
        $this->request = Http::uzumGraphql();
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

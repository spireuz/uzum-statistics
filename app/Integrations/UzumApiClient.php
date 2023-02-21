<?php

namespace App\Integrations;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

class UzumApiClient
{
    public function __construct(private PendingRequest $request)
    {
        $this->request = Http::baseUrl(config('uzum.base_url'))
            ->withHeaders([
                'Accept-Language' => config('uzum.lang.current'),
                'Authorization' => sprintf(
                    '%s %s',
                    config('uzum.auth_type'),
                    config('uzum.auth_token')
                )
            ])
            ->acceptJson()
            ->throw()
            ->retry(
                config('uzum.max-retry'),
                config('uzum.sleep')
            );
    }

    public function getCity(): array
    {
        return $this->request->get('main/city')->json('payload');
    }

    public function getCities(): array
    {
        return $this->request->get('main/cities')->json('payload');
    }

    public function getDeliveryPrice(int $cityId): array
    {
        return $this->request->get('v2/delivery/min-free-price', [
            'cityId' => $cityId
        ])->json('payload');
    }

    public function getDeliveryTime(array $params): array
    {
        return $this->request->get('main/delivery', $params)->json('payload');
    }

    public function getCategories(): array
    {
        return $this->request->get('main/root-categories')->json('payload');
    }

    public function getShopInfo(string $shopName): array
    {
        return $this->request->get("shop/$shopName")->json('payload');
    }

    public function getProduct(int $productId): array
    {
        return $this->request->get("v2/product/$productId")->json('payload.data');
    }

    public function getProductActionBanner(int $productId): array
    {
        return $this->request->get("product/actions/$productId")->json('0');
    }

    public function getProductReviews(int $productId, array $params): array
    {
        return $this->request
            ->get("product/$productId/reviews", $params)
            ->json('payload');
    }
}

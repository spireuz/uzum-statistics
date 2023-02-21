<?php

use App\Http\Controllers\Api\Categories\GetCategoriesController;
use App\Http\Controllers\Api\Cities\GetCitiesController;
use App\Http\Controllers\Api\Cities\GetCityController;
use App\Http\Controllers\Api\Delivery\GetDeliveryPriceController;
use App\Http\Controllers\Api\Delivery\GetDeliveryTimeController;
use App\Http\Controllers\Api\Products\GetProductActionBannerController;
use App\Http\Controllers\Api\Products\GetProductController;
use App\Http\Controllers\Api\Products\GetProductReviewsController;
use App\Http\Controllers\Api\Shops\GetShopInfoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')
    ->get('user', fn (Request $request) => $request->user());

Route::prefix('uzum')->group(function () {
    Route::get('city', GetCityController::class);
    Route::get('cities', GetCitiesController::class);
    Route::get('categories', GetCategoriesController::class);

    Route::prefix('delivery')->group(function () {
        Route::get('price', GetDeliveryPriceController::class);
        Route::get('time', GetDeliveryTimeController::class);
    });

    Route::get('shop/{shopName}', GetShopInfoController::class);

    Route::prefix('products')->group(function () {
        Route::get('/{productId}', GetProductController::class)
            ->whereNumber('productId');

        Route::get('/{productId}/action', GetProductActionBannerController::class)
            ->whereNumber('productId');

        Route::get('/{productId}/reviews', GetProductReviewsController::class)
            ->whereNumber('productId');
    });
});

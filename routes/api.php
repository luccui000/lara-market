<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\Auth\{
    LoginController,
    RegisterController,
};
use App\Http\Controllers\Api\Products\{
    IndexController as ProductIndexController,
    StoreController as ProductStoreController
};
use App\Http\Controllers\Api\Sellers\{
    IndexController as SellerIndexController,
    StoreController as SellerStoreController,
};
use App\Http\Controllers\Api\Orders\{
    IndexController as OrderIndexController
};
use App\Http\Controllers\Api\Crawler\{
    IndexController as CrawlerIndexController
};

Route::group(['prefix' => 'sellers', 'as' => 'sellers.'], function () {
    Route::get('/', SellerIndexController::class)->name('index');
    Route::post('/', SellerStoreController::class)->name('store');
});

Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
    Route::get('/', ProductIndexController::class)->name('index');
    Route::post('/', ProductStoreController::class)->name('store');
});
Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
    Route::get('/', OrderIndexController::class)->name('index');
});
Route::group(['prefix' => 'crawlers', 'as' => 'crawlers.'], function () {
    Route::post('/', CrawlerIndexController::class)->name('store');
});

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::post('login', LoginController::class)->name('login');
    Route::post('register', RegisterController::class)->name('register');

    Route::middleware('auth:sanctum')->group(function () {
        Route::get('me', [UserController::class, 'me'])->name('me');
    });
});


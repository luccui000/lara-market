<?php

use App\Http\Controllers\Api\Products\{
    IndexController as ProductIndexController
};
use App\Http\Controllers\Api\Orders\{
    IndexController as OrderIndexController
};

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
   Route::get('/', ProductIndexController::class)->name('index');
});
Route::group(['prefix' => 'orders', 'as' => 'orders.'], function () {
    Route::get('/', OrderIndexController::class)->name('index');
});

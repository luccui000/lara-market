<?php

use App\Http\Controllers\Api\Products\{
    IndexController
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
   Route::get('/', IndexController::class)->name('index');
});

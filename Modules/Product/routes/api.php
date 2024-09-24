<?php

use Illuminate\Support\Facades\Route;
use Modules\Product\Http\Controllers\ColorController;
use Modules\Product\Http\Controllers\ProductController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('product', ProductController::class)->names('product');
    Route::apiResource('color', ColorController::class)->names('color');
    Route::apiResource('group', ColorController::class)->names('group');
    Route::apiResource('image', ColorController::class)->names('image');
    Route::apiResource('productImage', ColorController::class)->names('productImage');
    Route::apiResource('productModel', ColorController::class)->names('productModel');
    Route::apiResource('productRelated', ColorController::class)->names('productRelated');
    Route::apiResource('rating', ColorController::class)->names('rating');
    Route::apiResource('review', ColorController::class)->names('review');
});

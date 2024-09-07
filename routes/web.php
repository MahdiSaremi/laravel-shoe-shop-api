<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::prefix('product')->controller(ProductController::class)->group(function () {
    Route::post('/', 'index');
    Route::post('{id}', 'show');
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


require __DIR__.'/auth.php';

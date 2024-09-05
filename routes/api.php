<?php

use App\Http\Controllers\ProductController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('product')->controller(ProductController::class)->group(function () {
    Route::post('/', 'index');
    Route::post('{id}', 'show');
});

require __DIR__.'/auth.php';

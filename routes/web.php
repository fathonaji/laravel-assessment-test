<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, "index"]);

Route::post('/products', [ProductController::class, 'store']);

Route::post('/products/update', [ProductController::class, 'update']);

<?php

use App\Domain\Category\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::apiResource('categories', CategoryController::class)
    ->only(['index', 'store']);

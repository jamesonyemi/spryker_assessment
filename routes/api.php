<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PyzBookController;

Route::prefix('v1')->group(function (): void {
    Route::apiResource('pyz_books', PyzBookController::class);
});

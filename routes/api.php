<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PyzBookController;

Route::apiResource('pyz_books', PyzBookController::class);


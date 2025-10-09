<?php

use Illuminate\Support\Facades\Route;
use Modules\DFAs\Http\Controllers\DFAsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('dfas', DFAsController::class)->names('dfas');
});

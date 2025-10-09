<?php

use Illuminate\Support\Facades\Route;
use Modules\SSAs\Http\Controllers\SSAsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('ssas', SSAsController::class)->names('ssas');
});

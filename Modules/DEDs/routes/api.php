<?php

use Illuminate\Support\Facades\Route;
use Modules\DEDs\Http\Controllers\DEDsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('deds', DEDsController::class)->names('deds');
});

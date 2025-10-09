<?php

use Illuminate\Support\Facades\Route;
use Modules\DGs\Http\Controllers\DGsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('dgs', DGsController::class)->names('dgs');
});

<?php

use Illuminate\Support\Facades\Route;
use Modules\DPRSs\Http\Controllers\DPRSsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('dprsses', DPRSsController::class)->names('dprss');
});

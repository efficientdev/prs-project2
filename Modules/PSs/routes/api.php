<?php

use Illuminate\Support\Facades\Route;
use Modules\PSs\Http\Controllers\PSsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('psses', PSsController::class)->names('pss');
});

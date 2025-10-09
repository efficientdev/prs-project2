<?php

use Illuminate\Support\Facades\Route;
use Modules\PRSs\Http\Controllers\PRSsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('prsses', PRSsController::class)->names('prss');
});

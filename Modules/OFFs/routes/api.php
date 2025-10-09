<?php

use Illuminate\Support\Facades\Route;
use Modules\OFFs\Http\Controllers\OFFsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('offs', OFFsController::class)->names('offs');
});

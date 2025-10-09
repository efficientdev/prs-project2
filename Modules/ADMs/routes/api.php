<?php

use Illuminate\Support\Facades\Route;
use Modules\ADMs\Http\Controllers\ADMsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('adms', ADMsController::class)->names('adms');
});

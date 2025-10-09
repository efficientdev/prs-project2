<?php

use Illuminate\Support\Facades\Route;
use Modules\PublicValidations\Http\Controllers\PublicValidationsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('publicvalidations', PublicValidationsController::class)->names('publicvalidations');
});

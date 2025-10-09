<?php

use Illuminate\Support\Facades\Route;
use Modules\PrivateValidations\Http\Controllers\PrivateValidationsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('privatevalidations', PrivateValidationsController::class)->names('privatevalidations');
});

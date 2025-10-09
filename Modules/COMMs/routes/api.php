<?php

use Illuminate\Support\Facades\Route;
use Modules\COMMs\Http\Controllers\COMMsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('comms', COMMsController::class)->names('comms');
});

<?php

use Illuminate\Support\Facades\Route;
use Modules\Registrations\Http\Controllers\RegistrationsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('registrations', RegistrationsController::class)->names('registrations');
});

<?php

use Illuminate\Support\Facades\Route;
use Modules\DEDs\Http\Controllers\DEDsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('deds', DEDsController::class)->names('deds');
});

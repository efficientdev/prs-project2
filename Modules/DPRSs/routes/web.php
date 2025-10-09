<?php

use Illuminate\Support\Facades\Route;
use Modules\DPRSs\Http\Controllers\DPRSsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('dprsses', DPRSsController::class)->names('dprss');
});

<?php

use Illuminate\Support\Facades\Route;
use Modules\PSs\Http\Controllers\PSsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('psses', PSsController::class)->names('pss');
});

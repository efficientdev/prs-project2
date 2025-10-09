<?php

use Illuminate\Support\Facades\Route;
use Modules\PRSs\Http\Controllers\PRSsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('prsses', PRSsController::class)->names('prss');
});

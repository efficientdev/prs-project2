<?php

use Illuminate\Support\Facades\Route;
use Modules\OFFs\Http\Controllers\OFFsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('offs', OFFsController::class)->names('offs');
});

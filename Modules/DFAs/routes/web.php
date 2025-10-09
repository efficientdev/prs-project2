<?php

use Illuminate\Support\Facades\Route;
use Modules\DFAs\Http\Controllers\DFAsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('dfas', DFAsController::class)->names('dfas');
});

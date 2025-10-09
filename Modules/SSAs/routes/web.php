<?php

use Illuminate\Support\Facades\Route;
use Modules\SSAs\Http\Controllers\SSAsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('ssas', SSAsController::class)->names('ssas');
});

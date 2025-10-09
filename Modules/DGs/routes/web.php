<?php

use Illuminate\Support\Facades\Route;
use Modules\DGs\Http\Controllers\ApplicationCtrl;


Route::middleware(['auth',
	'role:DG,ADM'
])->prefix('dg')->name('dg.')->group(function () {

    Route::resource('application', ApplicationCtrl::class)->names('applications');
});

/*
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('dgs', DGsController::class)->names('dgs');
});
*/
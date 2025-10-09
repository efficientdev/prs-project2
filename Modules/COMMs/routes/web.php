<?php

use Illuminate\Support\Facades\Route;
use Modules\COMMs\Http\Controllers\{COMMsController,ApplicationCtrl};


Route::middleware(['auth',
	'role:COMM,ADM'
])->prefix('commissioner')->name('commissioner.')->group(function () {

    Route::resource('application', ApplicationCtrl::class)->names('applications');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('comms', COMMsController::class)->names('comms');
});

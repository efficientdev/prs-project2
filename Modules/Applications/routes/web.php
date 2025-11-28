<?php

use Illuminate\Support\Facades\Route;

//use Modules\Applications\Http\Controllers\ApplicationsController;

use Modules\Applications\Http\Controllers\ApplicationController;
use Modules\Applications\Http\Controllers\ApprovalController;

//Route::get('/', fn() => redirect('/applications'));

Route::middleware(['auth', 'verified'])->group(function () {
Route::resource('applications', ApplicationController::class);

Route::post('applications/{application}/respond', [ApplicationController::class, 'respondToRequest'])->name('applications.respond');
Route::post('applications/{application}/resubmit', [ApplicationController::class, 'resubmit'])->name('applications.resubmit');

//approvals.show
Route::prefix('approvals')->name('approvals.')->group(function () {
    Route::get('/my', [ApprovalController::class, 'myApprovals'])->name('my');
    Route::get('/{approval}', [ApprovalController::class, 'show'])->name('show');

// 
    Route::post('/{approval}/input', [ApprovalController::class, 'requestApplicantInput'])->name('request-input');

    Route::post('/{approval}/approve', [ApprovalController::class, 'approve'])->name('approve');
    Route::post('/{approval}/reject', [ApprovalController::class, 'reject'])->name('reject');
});
});
/*
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('applications', ApplicationsController::class)->names('applications');
});
*/
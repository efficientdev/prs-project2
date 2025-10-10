<?php

use Illuminate\Support\Facades\Route;
use Modules\Registrations\Http\Controllers\RegistrationsController;


use Modules\Registrations\Http\Controllers\ApprovalController;

use Modules\Registrations\Http\Controllers\{
    SectionAController, SectionBController, SectionCController,
    SectionDController, SectionEController, SectionFController,
    SectionGController,UploadsCtrl
}; 

use Modules\Registrations\Http\Controllers\Issued\{IssuedController,ReceiptsController,FirstLetterController,PayForApproval
}; 


Route::middleware(['auth', 'verified'])->prefix('school/registration')->group(function () {

    Route::get('/{id}/portfolio', [IssuedController::class, 'show'])->name('registration.portfolio');
    Route::get('/{id}/pay-approval', [PayForApproval::class, 'show'])->name('registration.pay.approval');
    //

    Route::get('/{id}/receipts', [ReceiptsController::class, 'show'])->name('registration.receipts');
    Route::post('/{id}/receipts', [ReceiptsController::class, 'update'])->name('registration.receipts.print');//update

    Route::get('/{id}/first-letter', [FirstLetterController::class, 'show'])->name('registration.fletter');
    Route::post('/{id}/first-letter', [FirstLetterController::class, 'update'])->name('registration.fletter.print');//update
});
//

//role:ADM
Route::middleware(['auth', 'verified','role:ADM'])->prefix('school/registration')->group(function () {

	Route::prefix('approvals')->name('srapprovals.')->group(function () {
	    Route::get('/my', [ApprovalController::class, 'myApprovals'])->name('my');
	    Route::get('/{approval}', [ApprovalController::class, 'show'])->name('show');

	// 
	    Route::post('/{approval}/input', [ApprovalController::class, 'requestApplicantInput'])->name('request-input');

	    Route::post('/{approval}/approve', [ApprovalController::class, 'approve'])->name('approve');
	    Route::post('/{approval}/reject', [ApprovalController::class, 'reject'])->name('reject');
	});

});

Route::middleware(['auth', 'verified'])->prefix('school/registration')->group(function () {


    Route::post('applications/{application}/respond', [ApplicationController::class, 'respondToRequest']);//->name('applications.respond');


    Route::post('doc-uploads', [UploadsCtrl::class,'upload'])->name('rdoc.uploads');

    Route::get('/my-list', [RegistrationsController::class, 'index'])->name('registration.list'); 
    Route::get('/new/{cat_id}', [RegistrationsController::class, 'create'])->name('registration.create');
    Route::get('/{form_id}/timeline', [RegistrationsController::class, 'show'])->name('registration.timeline');

    Route::get('section-a/{form_id}', [SectionAController::class, 'show'])->name('registration.sectionA.show');
    Route::post('section-a/{form_id}', [SectionAController::class, 'store'])->name('registration.sectionA.store');

    Route::get('section-b/{form_id}', [SectionBController::class, 'show'])->name('registration.sectionB.show');
    Route::post('section-b/{form_id}', [SectionBController::class, 'store'])->name('registration.sectionB.store');

    Route::get('section-c/{form_id}', [SectionCController::class, 'show'])->name('registration.sectionC.show');
    Route::post('section-c/{form_id}', [SectionCController::class, 'store'])->name('registration.sectionC.store');

    Route::get('section-d/{form_id}', [SectionDController::class, 'show'])->name('registration.sectionD.show');
    Route::post('section-d/{form_id}', [SectionDController::class, 'store'])->name('registration.sectionD.store');

    Route::get('section-e/{form_id}', [SectionEController::class, 'show'])->name('registration.sectionE.show');
    Route::post('section-e/{form_id}', [SectionEController::class, 'store'])->name('registration.sectionE.store');

    Route::get('section-f/{form_id}', [SectionFController::class, 'show'])->name('registration.sectionF.show');
    Route::post('section-f/{form_id}', [SectionFController::class, 'store'])->name('registration.sectionF.store');

    Route::get('section-g/{form_id}', [SectionGController::class, 'show'])->name('registration.sectionG.show');
    Route::post('section-g/{form_id}', [SectionGController::class, 'store'])->name('registration.sectionG.store');

    Route::get('preview/{form_id}', [SectionGController::class, 'preview'])->name('registration.preview');
});

 
/*
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('registrations', RegistrationsController::class)->names('registrations');
});
*/
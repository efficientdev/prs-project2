<?php

use Illuminate\Support\Facades\Route;
use Modules\PrivateValidations\Http\Controllers\MyPrivateValidations;

use Modules\PrivateValidations\Http\Controllers\SectionAController;
use Modules\PrivateValidations\Http\Controllers\SectionBController;
use Modules\PrivateValidations\Http\Controllers\SectionCController;
use Modules\PrivateValidations\Http\Controllers\SectionDController;
use Modules\PrivateValidations\Http\Controllers\SectionEController;
use Modules\PrivateValidations\Http\Controllers\SectionFController;
use Modules\PrivateValidations\Http\Controllers\SectionGController;


Route::middleware(['auth', 'verified'])->prefix('private-school/validation')->group(function () {

    Route::get('/my-list', [MyPrivateValidations::class, 'index'])->name('private.validation.list'); 
    Route::get('/new', [MyPrivateValidations::class, 'create'])->name('private.validation.create');

    Route::get('/section-a/{form_id}', [SectionAController::class, 'show'])->name('private.validation.sectionA.show');
    Route::post('/section-a/{form_id}', [SectionAController::class, 'store'])->name('private.validation.sectionA.store');

    // Similarly for other sections:
    Route::get('/section-b/{form_id}', [SectionBController::class, 'show'])->name('private.validation.sectionB.show');
    Route::post('/section-b/{form_id}', [SectionBController::class, 'store'])->name('private.validation.sectionB.store');


	Route::get('section-c/{form_id}', [SectionCController::class, 'show'])->name('private.validation.sectionC.show');
	Route::post('section-c/{form_id}', [SectionCController::class, 'store'])->name('private.validation.sectionC.store');

	Route::get('section-d/{form_id}', [SectionDController::class, 'show'])->name('private.validation.sectionD.show');
	Route::post('section-d/{form_id}', [SectionDController::class, 'store'])->name('private.validation.sectionD.store');

	Route::get('section-e/{form_id}', [SectionEController::class, 'show'])->name('private.validation.sectionE.show');
	Route::post('section-e/{form_id}', [SectionEController::class, 'store'])->name('private.validation.sectionE.store');

	Route::get('section-f/{form_id}', [SectionFController::class, 'show'])->name('private.validation.sectionF.show');
	Route::post('section-f/{form_id}', [SectionFController::class, 'store'])->name('private.validation.sectionF.store');

	Route::get('section-g/{form_id}', [SectionGController::class, 'show'])->name('private.validation.sectionG.show');
	Route::post('section-g/{form_id}', [SectionGController::class, 'store'])->name('private.validation.sectionG.store');

    // ... and so on for sections C to G
});

/*
Route::middleware(['auth', 'verified'])->group(function () {

Route::get('section-a', [SectionAController::class, 'show'])->name('private.validation.sectionA.show');
Route::post('section-a', [SectionAController::class, 'store'])->name('private.validation.sectionA.store');

Route::get('section-b', [SectionBController::class, 'show'])->name('private.validation.sectionB.show');
Route::post('section-b', [SectionBController::class, 'store'])->name('private.validation.sectionB.store');

 
});*/

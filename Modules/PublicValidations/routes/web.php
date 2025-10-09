<?php

use Illuminate\Support\Facades\Route;
use Modules\PublicValidations\Http\Controllers\PublicValidationsController;
 
use Modules\PublicValidations\Http\Controllers\{
    SectionAController, SectionBController, SectionCController,
    SectionDController, SectionEController, SectionFController,
    SectionGController
};

Route::middleware(['auth', 'verified'])->prefix('public-school/validation')->group(function () {

    Route::get('/my-list', [PublicValidationsController::class, 'index'])->name('public.validation.list'); 
    Route::get('/new', [PublicValidationsController::class, 'create'])->name('public.validation.create');

    Route::get('section-a/{form_id}', [SectionAController::class, 'show'])->name('public.validation.sectionA.show');
    Route::post('section-a/{form_id}', [SectionAController::class, 'store'])->name('public.validation.sectionA.store');

    Route::get('section-b/{form_id}', [SectionBController::class, 'show'])->name('public.validation.sectionB.show');
    Route::post('section-b/{form_id}', [SectionBController::class, 'store'])->name('public.validation.sectionB.store');

    Route::get('section-c/{form_id}', [SectionCController::class, 'show'])->name('public.validation.sectionC.show');
    Route::post('section-c/{form_id}', [SectionCController::class, 'store'])->name('public.validation.sectionC.store');

    Route::get('section-d/{form_id}', [SectionDController::class, 'show'])->name('public.validation.sectionD.show');
    Route::post('section-d/{form_id}', [SectionDController::class, 'store'])->name('public.validation.sectionD.store');

    Route::get('section-e/{form_id}', [SectionEController::class, 'show'])->name('public.validation.sectionE.show');
    Route::post('section-e/{form_id}', [SectionEController::class, 'store'])->name('public.validation.sectionE.store');

    Route::get('section-f/{form_id}', [SectionFController::class, 'show'])->name('public.validation.sectionF.show');
    Route::post('section-f/{form_id}', [SectionFController::class, 'store'])->name('public.validation.sectionF.store');

    Route::get('section-g/{form_id}', [SectionGController::class, 'show'])->name('public.validation.sectionG.show');
    Route::post('section-g/{form_id}', [SectionGController::class, 'store'])->name('public.validation.sectionG.store');

    Route::get('preview/{form_id}', [SectionGController::class, 'preview'])->name('public.validation.preview');
});

 

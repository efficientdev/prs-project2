<?php

use Illuminate\Support\Facades\Route;
use Modules\PRSs\Http\Controllers\{PRSsController,ReportController,EditReport};


// routes/web.php
use Modules\PRSs\Http\Controllers\{
    SectionAController,
    SectionBController,
    SectionCController, SectionDController,SectionGController
};

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('prsses', PRSsController::class)->names('prss');

Route::get('prss/report/{id}/summary', [ReportController::class, 'show'])->name('prss.report.summary');

});


Route::middleware(['auth', 'verified'])->prefix('prs/{report}')->name('prss.')->group(function () {


    Route::get('section-a', [SectionAController::class, 'show'])->name('sectionA.show');
    Route::post('section-a', [SectionAController::class, 'store'])->name('sectionA.store');

    Route::get('section-b', [SectionBController::class, 'show'])->name('sectionB.show');
    Route::post('section-b', [SectionBController::class, 'store'])->name('sectionB.store');

    Route::get('section-c', [SectionCController::class, 'show'])->name('sectionC.show');
    Route::post('section-c', [SectionCController::class, 'store'])->name('sectionC.store');


    Route::get('section-d', [SectionDController::class, 'show'])->name('sectionD.show');
    Route::post('section-d', [SectionDController::class, 'store'])->name('sectionD.store');

    Route::get('section-g', [SectionGController::class, 'show'])->name('sectionG.show');
    Route::post('section-g', [SectionGController::class, 'store'])->name('sectionG.store');
    /*
    Route::get('section-a', [EditReport::class, 'show'])->name('edit.show');
    Route::post('section-a', [EditReport::class, 'store'])->name('edit.store');
    */
});
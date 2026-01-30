<?php

use Illuminate\Support\Facades\Route;
use Modules\CIEs\Http\Controllers\{ApplicationCtrl,CieUploadsCtrl,CieUploads2Ctrl};


// routes/web.php
use Modules\CIEs\Http\Controllers\{
    SectionAController,
    SectionBController,
    SectionCController,
    SectionDController,
    SectionGController,SummaryController
};
 
Route::middleware(['auth',
    'role:CIE,ADM'
])->group(function () {


    Route::post('cie-doc-uploads', [CieUploadsCtrl::class,'upload'])->name('ciedoc.uploads');

    Route::get('cie-doc-uploads-delete', [CieUploadsCtrl::class,'destroy'])->name('ciedoc.uploads.drop');

    Route::post('cie-doc-uploads-multiple', [CieUploadsCtrl::class,'multiple'])->name('ciedoc.uploads.multiple');

    //multiple

    Route::post('cie-doc-uploads-many', [CieUploads2Ctrl::class,'upload'])->name('ciedoc.uploads2');

    Route::post('cie-doc-uploads-many-multiple', [CieUploads2Ctrl::class,'multiple'])->name('ciedoc.uploads2.multiple');

    //CieUploads2Ctrl


Route::get('/cies/{report}/summary', [SummaryController::class, 'show'])->name('cies.report.summary');

Route::prefix('cies/{report}')->name('cies.')->group(function () {
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
});

});

Route::middleware(['auth',
	'role:CIE,ADM'
])->prefix('cie')->name('cie.')->group(function () {

    Route::resource('application', ApplicationCtrl::class)->names('applications');
});

Route::middleware(['auth', 'verified'])->group(function () {  
    //Route::resource('cies', CIEsController::class)->names('cies');
});

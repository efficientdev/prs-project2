<?php

use Illuminate\Support\Facades\Route;
use Modules\Proprietors\Http\Controllers\{SignupCtrl,StartApplicationCtrl,StartApprovalCtrl,ApplicationTypeCtrl};


use Modules\Proprietors\Http\Controllers\PaymentController;
use Modules\Proprietors\Http\Controllers\UserPaymentController;
use Modules\Proprietors\Http\Controllers\{AdminPaymentController,ApplicationCtrl};
//UploadsCtrl

//use Modules\Proprietors\Http\Controllers\Actions\{S1_Upload};

Route::middleware(['auth','role:proprietor'])->prefix('proprietor')
//->name('proprietor.')
->group(function () {
    
    /*
    Route::resource('application-docs', S1_Upload::class)->names('application.docs');*/
    //

    Route::get('application/{id}/edit', [ApplicationCtrl::class, 'edit'])->name('application.edit');
    Route::post('application', [ApplicationCtrl::class, 'store'])->name('application.store'); 
    Route::get('application/{id}', [ApplicationCtrl::class, 'show'])->name('proprietor.application.show');

    Route::post('payments/{type}/{ownerId}', [PaymentController::class, 'store'])
        ->name('payments.store');
    Route::get('payments/{type}/{ownerId}/{paymentId}', [PaymentController::class, 'show'])
        ->name('payments.show');
    Route::get('payments/{type}/{ownerId}/{paymentId}/callback', [PaymentController::class, 'callback'])
        ->name('payments.callback');

    Route::get('payments/history', [UserPaymentController::class, 'history'])->name('payments.history');
});
 
Route::prefix('admin')->middleware(['auth', 'role:ADM,DFA'
])->group(function () {

    Route::get('/admin/payments/export', [AdminPaymentController::class, 'export'])->name('admin.payments.export');
    Route::get('payments', [AdminPaymentController::class, 'index'])->name('admin.payments.index');
    Route::get('payments/{status1?}/status', [AdminPaymentController::class, 'index'])->name('admin.payments.sindex');

    Route::get('payments/{id}', [AdminPaymentController::class, 'show'])->name('admin.payments.show');
    Route::post('payments/{id}/approve', [AdminPaymentController::class, 'approve'])->name('admin.payments.approve');
    Route::post('payments/{id}/decline', [AdminPaymentController::class, 'decline'])->name('admin.payments.decline');
});


	Route::resource('signup', SignupCtrl::class)->names('signup');
	
Route::middleware(['auth', 'verified','role:proprietor'])->group(function () {

    //ApplicationTypeCtrl
    Route::resource('application-types', ApplicationTypeCtrl::class)->names('application.types');

	//Route::resource('s-application', StartApplicationCtrl::class)->names('application.types');

    Route::post('s-approval', [StartApprovalCtrl::class,'getpayinfo'])->name('s.approval');
    //Route::post('doc-uploads', [UploadsCtrl::class,'upload'])->name('doc.uploads');

    //

// 

 

});

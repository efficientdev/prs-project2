<?php

use Illuminate\Support\Facades\Route;
use Modules\PRSs\Http\Controllers\{PRSsController,ReportController};
//    use App\Http\Controllers\;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('prsses', PRSsController::class)->names('prss');

Route::get('prss/report/{id}/summary', [ReportController::class, 'show'])->name('prss.report.summary');

});

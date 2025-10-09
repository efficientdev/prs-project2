<?php

use Illuminate\Support\Facades\Route;
use Modules\ADMs\Http\Controllers\{ADMsController,UserRoleController};
// use App\Http\Controllers\UserRoleController;


Route::middleware(['auth', 'verified','role:ADM'])->prefix('admin')->name('admin.')->group(function () {

 
Route::get('/users', [UserRoleController::class, 'index'])->name('users.index');
Route::post('/users/{id}/assign-role', [UserRoleController::class, 'assignRole'])->name('users.assignRole');
Route::post('/users/{id}/remove-role', [UserRoleController::class, 'removeRole'])->name('users.removeRole');

/*
Route::get('/users/search', [UserRoleController::class, 'searchUsers'])->name('search.users');
Route::get('/users/{id}/roles', [UserRoleController::class, 'listUserRoles']);
Route::post('/users/{id}/roles/assign', [UserRoleController::class, 'assignRole']);
Route::post('/users/{id}/roles/remove', [UserRoleController::class, 'removeRole']);

*/
    Route::resource('adms', ADMsController::class)->names('adms');
});

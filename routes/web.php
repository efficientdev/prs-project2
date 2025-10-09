<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleSetupController;

use Illuminate\Support\Facades\Mail;
use App\Mail\TestEmail;

Route::get('/send-test-email', function () {
    Mail::to('digitalmonarchltd@gmail.com')->send(new TestEmail());
    return 'Email sent!';
});


Route::get('/setup-roles', [RoleSetupController::class, 'setupRoles']);


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

	
        $user = auth()->user();
        if ($user->hasRole('ADM')) {
            return redirect()->route('admin.users.index');
        } elseif ($user->hasRole('CIE')) {
            return redirect()->route('cie.applications.index');
        } elseif ($user->hasRole('COMM')) {
            return redirect()->route('commissioner.applications.index');
        } elseif ($user->hasRole('DED')) {
            return redirect()->route('dashboard');
        } elseif ($user->hasRole('DFA')) {
            return redirect()->route('dashboard');
        } elseif ($user->hasRole('DG')) {
            return redirect()->route('dashboard');
        } elseif ($user->hasRole('DPRS')) {
            return redirect()->route('dashboard');
        }elseif ($user->hasRole('OFF')) {
            return redirect()->route('dashboard');
        } elseif ($user->hasRole('proprietor')) {
            //return redirect()->route('application.types.index');
            return redirect()->route('public.validation.list');
        } elseif ($user->hasRole('PRS')) {
            return redirect()->route('dashboard');
        }elseif ($user->hasRole('PS')) {
            return redirect()->route('dashboard');
        } elseif ($user->hasRole('SSA')) {
            return redirect()->route('dashboard');
        } 
    //return view('dashboard');
    return view('coming-soon');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

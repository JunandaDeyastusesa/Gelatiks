<?php

use App\Http\Controllers\CarrerController;
use App\Http\Controllers\HistoryApplicantController;
use App\Http\Controllers\JobApplyController;
use App\Http\Controllers\ProfileApplicantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicantsController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\NewsEventController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

Route::post('login', [AuthController::class, 'login'])->name('login');


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('about', fn() => view('customer.about'))->name('customer.about');
// Route::get('profile', fn() => view('customer.profile'))->name('customer.profile');

// Profile Applicant
Route::resource('profile', ProfileApplicantController::class);
Route::get('profile/{id}/account', [ProfileApplicantController::class, 'editAccount'])->name('edit.account');
Route::put('profile/{id}/account', [ProfileApplicantController::class, 'updateAccount'])->name('update.account');
Route::get('profile/{id}/photo', [ProfileApplicantController::class, 'editPhoto'])->name('edit.photo');
Route::put('profile/{id}/photo', [ProfileApplicantController::class, 'updatePhoto'])->name('update.photo');
// End Profile Applicant

// History Job Applicant
Route::resource('history', HistoryApplicantController::class);
Route::get('job-details', fn() => view('customer.carrer.show'))->name('customer.carrer');
// End Job Applicant

// Carrer
Route::resource('carrer', CarrerController::class);
Route::get('carrer/{id}/apply', [CarrerController::class, 'applyNow'])->name('carrer.apply');
Route::post('carrer/{id}/apply', [CarrerController::class, 'submitApplyNow'])->name('carrer.submit');
// End Carrer


Route::middleware(['auth', 'role:Admin,HRD'])->group(function () {
    Route::resource('applicants', ApplicantsController::class);
    Route::resource('jobs', JobController::class);
    Route::get('jobs/{id}/applicants', [JobController::class, 'showApplicants'])->name('jobs.applicants');

    Route::resource('jobApplies', JobApplyController::class);
    Route::put('jobApplies/{jobApply}/reject', [JobApplyController::class, 'RejectStatus'])->name('jobApplies.reject');

});

// =================== ADMIN ONLY ===================
Route::middleware(['auth', 'role:Admin'])->group(function () {
    Route::get('coverage', fn() => view('admin.coverage.index'))->name('admin.coverage');
    Route::get('gallery', fn() => view('admin.gallery.index'))->name('admin.gallery');
    Route::get('testimoni', fn() => view('admin.testimoni.index'))->name('admin.testimoni');
    Route::get('partnership', fn() => view('admin.partnership.index'))->name('admin.partnership');
    Route::resource('newsEvent', NewsEventController::class);
});

// =================== LOGOUT ===================
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->middleware('auth')->name('logout');

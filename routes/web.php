<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ApplicantsController;
use App\Http\Controllers\JobController;
use App\Exports\JobsExport;
use App\Http\Controllers\NewsEventController;
use App\Http\Controllers\TestimoniController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('login', function () {
    return view('auth.login');
})->name('login');

Route::get('register', function () {
    return view('auth.register');
})->name('register');

Route::get('about', function () {
    return view('customer.about');
})->name('customer.about');



// Manual
Route::get('coverage', function () {
    return view('admin.coverage.index');
})->name('admin.coverage');

Route::get('gallery', function () {
    return view('admin.gallery.index');
})->name('admin.gallery');

// Route::get('testimoni', function () {
//     return view('admin.testimoni.index');
// })->name('admin.testimoni');

Route::get('partnership', function () {
    return view('admin.partnership.index');
})->name('admin.partnership');

Route::get('carrer', function () {
    return view('customer.carrer');
})->name('customer.carrer');

// Route untuk export excel manual dengan closure
Route::get('/export-jobs', function () {
    return Excel::download(new JobsExport, 'jobs.xlsx');
});

// Route untuk export excel via controller
Route::get('/jobs/export-excel', [JobController::class, 'exportExcel'])->name('jobs.exportExcel');


Route::resource('gallery', GalleryController::class);

Route::resource('jobs', JobController::class);
Route::get('jobs/{id}/applicants', [JobController::class, 'showApplicants'])->name('jobs.applicants');

Route::resource('applicants', ApplicantsController::class);
Route::get('/jobs/{id}/export-applicants', [JobController::class, 'exportApplicants'])->name('jobs.exportApplicants');
Route::resource('newsEvent', NewsEventController::class);

Route::resource('testimoni', TestimoniController::class);

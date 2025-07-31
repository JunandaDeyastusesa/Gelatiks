<?php

use App\Http\Controllers\ApplicantsController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\NewsEventController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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

// Route::get('newsEvent', function () {
//     return view('admin.newsEvent.index');
// })->name('admin.newsEvent');


Route::get('testimoni', function () {
    return view('admin.testimoni.index');
})->name('admin.testimoni');

Route::get('partnership', function () {
    return view('admin.partnership.index');
})->name('admin.partnership');

// Route::get('applicants', function () {
//     return view('admin.applicants.index');
// })->name('admin.applicants');

// Route::get('jobs', function () {
//     return view('admin.jobs.index');
// })->name('admin.jobs');


// Route::resource('jobs', JobController::class);
// Route::post('jobs/create', [JobController::class, 'store']);
Route::get('carrer', function () {
    return view('customer.carrer');
})->name('customer.carrer');


Route::resource('jobs', JobController::class);
Route::get('jobs/{id}/applicants', [JobController::class, 'showApplicants'])->name('jobs.applicants');

Route::resource('applicants', ApplicantsController::class);


Route::get('/jobs/{id}/export-applicants', [JobController::class, 'exportApplicants'])->name('jobs.exportApplicants');

Route::resource('newsEvent', NewsEventController::class);

Route::resource('gallery', GalleryController::class);
 

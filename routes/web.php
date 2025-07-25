<?php

use App\Http\Controllers\ApplicantsController;
use App\Http\Controllers\JobController;
use App\Exports\JobsExport;
use Maatwebsite\Excel\Facades\Excel;
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

// Route untuk export excel manual dengan closure
Route::get('/export-jobs', function () {
    return Excel::download(new JobsExport, 'jobs.xlsx');
});

// Route untuk export excel via controller
Route::get('/jobs/export-excel', [JobController::class, 'exportExcel'])->name('jobs.exportExcel');

Route::resource('jobs', JobController::class);
Route::get('jobs/{id}/applicants', [JobController::class, 'showApplicants'])->name('jobs.applicants');

Route::resource('applicants', ApplicantsController::class);

<?php

use App\Http\Controllers\JobController;
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

Route::get('applicants', function () {
    return view('admin.applicants.index');
})->name('admin.applicants');

Route::get('jobs', function () {
    return view('admin.jobs.index');
})->name('admin.jobs');
Route::get('jobs/applicants', function () {
    return view('admin.jobs.applicants');
})->name('admin.jobs/applicants');


// Route::resource('jobs', JobController::class);
Route::post('jobs/create', [JobController::class, 'store']);
Route::get('carrer', function () {
    return view('customer.carrer');
})->name('customer.carrer');


Route::resource('jobs', JobController::class);

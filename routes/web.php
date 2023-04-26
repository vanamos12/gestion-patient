<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/patient/create', [App\Http\Controllers\HomeController::class, 'patientCreate'])->name('patient.create');
Route::post('/patient/store', [App\Http\Controllers\HomeController::class, 'patientStore'])->name('patient.store');

Route::post('/consultation/store', [App\Http\Controllers\HomeController::class, 'consultationStore'])->name('consultation.store');
Route::get('/consultation/list', [App\Http\Controllers\HomeController::class, 'consultationList'])->name('consultation.list');
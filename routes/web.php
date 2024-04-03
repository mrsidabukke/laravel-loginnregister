<?php

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
});

//agar bisa diakses hanya oleh user yang sudah terautentikasi
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/rahasia', [App\Http\Controllers\HomeController::class, 'rahasia'])->name('rahasia')->middleware('verified');


Route::middleware(['admin'])->group(function () {

   Route::get('/admin',  [App\Http\Controllers\HomeController::class, 'admin']);
});
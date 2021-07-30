<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('is_approved');;
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('/unapproved', [App\Http\Controllers\HomeController::class, 'unapproved'])->name('unapproved');

Route::get('/accept/{id}', [App\Http\Controllers\HomeController::class, 'accept'])->name('accept');
Route::get('/decline/{id}', [App\Http\Controllers\HomeController::class, 'decline'])->name('decline');

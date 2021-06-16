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

// Route::get('/', function () {
//     return view('home');
// });


Route::get('/', [App\Http\Controllers\AdminController::class, 'home']);
//Auth::routes();

Route::view('/login', 'auth.login')->name('login');
Route::view('/register', 'auth.register')->name('register');

Route::get('/add-business', [App\Http\Controllers\AdminController::class, 'addBusiness'])->middleware('web');
Route::view('/add-category', 'addCategory');

Route::post('/login', [App\Http\Controllers\AdminController::class, 'login']);
Route::post('/register', [App\Http\Controllers\AdminController::class, 'register']);
Route::post('/business', [App\Http\Controllers\AdminController::class, 'createBusinessListing']);
Route::post('/category', [App\Http\Controllers\AdminController::class, 'createCategory']);

// Route::get('/register', [App\Http\Controllers\AdminController::class, 'register']);
// Route::post('/business', [App\Http\Controllers\AdminController::class, 'createBusinessListing'])->name('home');
// Route::post('/category', [App\Http\Controllers\AdminController::class, 'createCategory'])->name('home');

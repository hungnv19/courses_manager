<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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
//     return view('client.pages.index');
// });

// Route::get('dashboard', [HomeController::class, 'index'])->name('home.index');

//client routes
Route::get('/', [ClientController::class, 'index'])->name('home-client');
Route::get('login', [AuthController::class, 'create'])->name('client-login-create');
Route::post('login', [AuthController::class, 'store'])->name('client-login-store');
//register client
Route::get('register', [RegisterController::class, 'createClient'])->name('register.client.create');
Route::post('register', [RegisterController::class, 'storeClient'])->name('register.client.store');

//lecture routes
Route::resource('category', CategoryController::class);


//admin routes
Route::resource('user', UserController::class);
Route::resource('news', NewsController::class);

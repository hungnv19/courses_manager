<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CourseClassController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use App\Models\Level;
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



//client routes
Route::get('/', [ClientController::class, 'index'])->name('home-client');
Route::get('about', [ClientController::class, 'about'])->name('client.about');
Route::get('blog', [ClientController::class, 'blog'])->name('client.blog');
Route::get('contact', [ClientController::class, 'contact'])->name('client.contact');
Route::get('courses', [ClientController::class, 'courses'])->name('client.courses');
Route::get('login', [AuthController::class, 'create'])->name('login.create');
Route::post('login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy']);

//register client
Route::get('register', [RegisterController::class, 'createClient'])->name('register.client.create');
Route::post('register', [RegisterController::class, 'storeClient'])->name('register.client.store');

//lecture routes
Route::middleware('lecturer')->group(function () {
    Route::prefix('lecturer')->group(function () {
        Route::get('dashboard-lecturer', [LecturerController::class, 'index'])->name('lecturer.dashboard');
        Route::get('profile', [LecturerController::class, 'profile'])->name('lecturer.profile');
        Route::post('profile', [LecturerController::class, 'updateProfile'])->name('profile.lecturer.update');
        Route::resource('categories', CategoryController::class);
        Route::resource('classes.courses', CourseController::class);
        Route::resource('classes', ClassController::class);
        Route::resource('levels', LevelController::class);
        Route::resource('languages', LanguageController::class);
        Route::resource('subject', SubjectController::class);
        Route::resource('section', SectionController::class);
        Route::resource('section.question', QuestionController::class);
    });
});

//admin routes
Route::middleware('admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.home.index');
        Route::resource('user', UserController::class);
        Route::resource('news', NewsController::class);
    });
});

//admin routes
Route::middleware('user')->group(function () {
    Route::prefix('user')->group(function () {
        Route::resource('quiz', QuizController::class);
    });
});

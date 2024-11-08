<?php

use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('mentor.index');
// });
Route::get('/', [FrontendController::class, 'index']);
Route::get('/about', [FrontendController::class, 'about']);
Route::get('/course', [FrontendController::class, 'course']);
Route::get('/trainer', [FrontendController::class, 'trainer']);
Route::get('/event', [FrontendController::class, 'event']);
Route::get('/contact', [FrontendController::class, 'contact']);

// Route::get('/events', function () {
//     return view('mentor.events');
// });

// Route::get('/about', function () {
//     return view('mentor.about');
// });

// Route::get('/courses', function () {
//     return view('mentor.courses');
// });

// Route::get('/pricing', function () {
//     return view('mentor.pricing');
// });

// Route::get('/contact', function () {
//     return view('mentor.contact');
// });

// Route::get('/trainers', function () {
//     return view('mentor.trainers');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::resource('/course', CourseController::class);
    Route::resource('/file', FileController::class);
    Route::resource('/courseCategory', CourseCategoryController::class);
    Route::resource('/trainer', TrainerController::class);
    Route::resource('/event', EventsController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

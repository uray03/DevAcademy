<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\QuizController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home page
Route::get('/', function () {
    return view('home');
})->name('home');

// Course listing & detail
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');

// Community
Route::get('/komunitas', [CommunityController::class, 'index'])->name('komunitas');
Route::post('/komunitas', [CommunityController::class, 'store'])->name('komunitas.store');

// Comments (avoid duplicate route)
Route::post('/komunitas/{post}/komentar', [CommentController::class, 'store'])->name('komentar.store');

// Quiz submit & certificate
Route::get('/courses/{course}/quiz', [QuizController::class, 'show'])->name('quiz.show');
Route::post('/courses/{course}/quiz', [QuizController::class, 'submit'])->name('quiz.submit');
Route::get('/courses/{course}/certificate', [QuizController::class, 'downloadCertificate'])->name('certificate.download');


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Course management (for admins or course creators)
    Route::resource('courses', CourseController::class)->except(['index', 'show']);

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';

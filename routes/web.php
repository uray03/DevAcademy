<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\QuizController;

Route::get('/', function () {
    return view('home');
});

Route::post('/courses/{course}/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');
Route::get('/courses/{course}/certificate', [QuizController::class, 'downloadCertificate'])->name('certificate.download');
Route::post('/quiz/submit/{course}', [QuizController::class, 'submit'])->name('quiz.submit');
Route::get('/certificate/{courseId}/download', [QuizController::class, 'downloadCertificate'])->name('certificate.download');


Route::get('/komunitas', [CommunityController::class, 'index'])->name('komunitas');
Route::post('/komunitas', [CommunityController::class, 'store'])->name('komunitas.store');
Route::post('/komunitas/{id}/komentar', [CommentController::class, 'store'])->name('komentar.store');
Route::post('/komunitas/{post}/komentar', [CommentController::class, 'store'])->name('komentar.store');


Route::get('/courses/{course}', [CourseController::class, 'show'])->name('courses.show');
Route::post('/courses/{course}/quiz', [QuizController::class, 'submit'])->name('quiz.submit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('courses', CourseController::class)->middleware('auth');
#Route::resource('courses', CourseController::class)->except(['index', 'show'])->middleware('auth');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

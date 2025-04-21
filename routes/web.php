<?php

use App\Http\Controllers\CourseDataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RequestsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        //'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/nouvelle_demande', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/demandes', function () {
    return Inertia::render('Request');
})->middleware(['auth', 'verified'])->name('request');

Route::get('/demandes_utilisateur', function () {
    return Inertia::render('RequestUser');
})->middleware(['auth', 'verified'])->name('request_user');

Route::get('/approbation', function () {
    return Inertia::render('Approvals');
})->middleware(['auth', 'verified'])->name('approvals');

Route::get('/utilisateurs', function () {
    return Inertia::render('Users');
})->middleware(['auth', 'verified'])->name('users');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/requests', [RequestsController::class, 'show'])->name('requests');
    Route::get('/api/requests', [RequestsController::class, 'index'])->name('requests.index');
    Route::put('/api/requests/update/{id}', [RequestsController::class, 'update'])->name('requests.update');
});

Route::post('/fetch-course-data', [CourseDataController::class, 'fetchCourseData'])->name('fetch.course.data');

Route::post('/generate-pdf', [PdfController::class, 'generate'])->name('generate.pdf');

Route::post('/submit-pdf', [PdfController::class, 'submit'])->name('submit.pdf');

require __DIR__.'/auth.php';

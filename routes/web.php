<?php

use App\Http\Controllers\CourseDataController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RequestsController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

// Shared routes (available to all authenticated users)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/nouvelle_demande', fn() => Inertia::render('Dashboard'))->name('dashboard');
    Route::get('/requests', [RequestsController::class, 'show'])->name('requests');

    // Public API and form submission routes
    Route::get('/api/requests', [RequestsController::class, 'index'])->name('requests.index');
    Route::post('/fetch-course-data', [CourseDataController::class, 'fetchCourseData'])->name('fetch.course.data');
    Route::post('/generate-pdf', [PdfController::class, 'generate'])->name('generate.pdf');
    Route::post('/submit-pdf', [PdfController::class, 'submit'])->name('submit.pdf');
});

// Admin only
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/utilisateurs', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/utilisateurs/fetch', [UserController::class, 'fetch'])->name('admin.users.fetch');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::post('/admin/users/{id}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});

// Prof and Admin only
Route::middleware(['auth', 'verified', 'role:prof|admin'])->group(function () {
    Route::get('/demandes_utilisateur', fn() => Inertia::render('RequestUser'))->name('request_user');
});

// Secretary and Admin only
Route::middleware(['auth', 'verified', 'role:secretary|admin'])->group(function () {
    Route::get('/approbation', fn() => Inertia::render('Approvals'))->name('approvals');
});

// Director and Admin only
Route::middleware(['auth', 'verified', 'role:secretary|director|admin'])->group(function () {
    Route::get('/approbation_directeur', fn() => Inertia::render('ApprovalsDirector'))->name('approvals_director');
});

// Secretary, Director and Admin only
Route::middleware(['auth', 'verified', 'role:secretary|director|admin'])->group(function () {
    Route::get('/demandes', fn() => Inertia::render('Request'))->name('request');
    Route::put('/api/requests/update/{id}', [RequestsController::class, 'update'])->name('requests.update');
});

require __DIR__.'/auth.php';
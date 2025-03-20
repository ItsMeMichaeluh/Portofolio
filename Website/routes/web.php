<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/create_project', function () {
    return view('create_project');
})->middleware(['auth', 'verified'])->name('create_project');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [ProjectController::class, 'dashboard'])->name('dashboard');
    Route::get('/projects_show/{id}', [ProjectController::class, 'show'])->name('projects_show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
});

Route::middleware('auth')->group(function () {
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
});

require __DIR__.'/auth.php';

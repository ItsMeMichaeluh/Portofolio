<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/create_project', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('create_project');

Route::middleware('auth')->group(function () {
    Route::get('/create_project', [ProjectController::class, 'create'])->name('create_project');
    Route::get('/dashboard', [ProjectController::class, 'dashboard'])->name('dashboard');
    Route::get('/projects_show/{id}', [ProjectController::class, 'show'])->name('projects_show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('project.destroy');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::get('/projects/{projects}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}/images/{image}', [ImageUploadController::class, 'deleteImage'])->name('projects.images.destroy');
});

require __DIR__.'/auth.php';

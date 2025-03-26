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
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
});

require __DIR__.'/auth.php';

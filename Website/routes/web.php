<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    Route::delete('/projects/{project}/images/{image}', [ImageController::class, 'deleteImage'])->name('projects.images.destroy');
    Route::post('/projects/{project}/images', [ImageController::class, 'upload'])->name('projects.images.store');
});

Route::get('/over', function () {
    return view('index.over');
})->name('over');

Route::get('/contact', function () {
    return view('index.contact');
})->name('contact');

Route::get('/school', function () {
    return view('index.school');
})->name('school');

Route::get('/', function () {
    return view('index.index');
})->name('index');

require __DIR__.'/auth.php';

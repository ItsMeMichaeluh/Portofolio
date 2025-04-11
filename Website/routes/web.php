<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\SentEmail;


Route::middleware('auth')->group(function () {
    Route::get('/create_project', [ProjectController::class, 'create'])->name('create_project');
    Route::get('/dashboard', [ProjectController::class, 'dashboard'])->name('dashboard');
    Route::get('/projects_show/{id}', [ProjectController::class, 'show'])->name('projects_show');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('project.destroy');
    Route::get('projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{projects}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}/images/{image}', [ImageController::class, 'deleteImage'])->name('projects.images.destroy');
    Route::post('/projects/{project}/images', [ImageController::class, 'upload'])->name('projects.images.store');
    Route::delete('/emails/{id}', [ContactController::class, 'destroy'])->name('emails.destroy');

});
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');

Route::get('/projecten/{project}', [ProjectController::class, 'detail'])->name('project_details');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact');

Route::get('/school', [ProjectController::class, 'school'])->name('school');

Route::get('/over', function () {
    return view('index.over');
})->name('over');

Route::get('/contact', function () {
    return view('index.contact');
})->name('contact');

Route::get('/index', function () {
    return view('index.index');
})->name('index');

Route::get('/', function () {
    return view('index.index');
})->name('index');

require __DIR__.'/auth.php';

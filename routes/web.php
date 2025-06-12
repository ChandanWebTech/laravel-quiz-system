<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin-login', function () {
    return view('admin-login');
});

// Route::view('/admin-login','/admin-login');

Route::post('admin-login', [AdminController::class, 'login']);
Route::get('dashboard', [AdminController::class, 'dashboard']);
Route::get('admin-categories', [AdminController::class, 'categories']);
Route::get('admin-logout', [AdminController::class, 'logout']);
Route::post('add-category', [AdminController::class, 'addCategory']);
Route::get('category/delete/{id}', [AdminController::class, 'deleteCategory']);
Route::get('add-quiz', [AdminController::class, 'addQuiz']);
Route::post('add-mcq', [AdminController::class, 'addMcqs']);
Route::get('end-quiz', [AdminController::class, 'endQuizs']);
Route::get('show-quiz/{id}', [AdminController::class, 'showQuizs']);

// Route::view('dashboard','admin');

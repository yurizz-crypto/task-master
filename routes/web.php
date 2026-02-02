<?php

use App\Http\Controllers\PageNavigator;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;

// Public
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register-form');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login-form');
Route::post('/', [AuthController::class, 'login'])->name('login.submit');

// Protected
Route::middleware(['isLoggedIn'])->group(function () {
    // Read
    Route::get('/dashboard', [PageNavigator::class, 'goToDashboard'])->name('dashboard');
    Route::get('/completed-tasks', [PageNavigator::class, 'goToCompletedTasks'])->name('tasks.complete');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Create
    Route::post('/tasks', [TaskController::class, 'store'])->name(name: 'tasks.store');

    // Update
    Route::patch('/tasks/{task}/status', [TaskController::class, 'updateStatus'])->name(name: 'task.change');

    // Edit & Delete
    Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
    Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');

    // Profile RUD
    Route::get('/profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
});
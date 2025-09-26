<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GoalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ReminderController;

Route::get('/', function () {
    return view('home');
});

Route::get('/kontak', function () {
    return view('kontak');
});

// Auth Routes
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes (require authentication)
Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Goals Routes
    Route::resource('goals', GoalController::class);
    Route::get('/tambah', [GoalController::class, 'create'])->name('goals.create');

    // Tasks Routes
    Route::resource('tasks', TaskController::class);
    Route::get('/tambahTask', [TaskController::class, 'index'])->name('tasks.index');

    // Reminders Routes
    Route::resource('reminders', ReminderController::class, ['parameters' => ['reminders' => 'reminder_id']]);
    Route::get('/tambahReminder', [ReminderController::class, 'index'])->name('reminders.index');

    // Other Pages
    Route::get('/kelola', [GoalController::class, 'index'])->name('kelola');

    Route::get('/riwayat', function () {
        return view('riwayat');
    });
});

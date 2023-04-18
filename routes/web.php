<?php

use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DocumentController;
use App\Http\Controllers\Admin\ExamController;
use App\Http\Controllers\Admin\GroupController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\QuoteController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Admin
Route::prefix('/admin')->group(function () {
    // Router Authentication
    Route::get('/login', [AdminLoginController::class, 'showLoginFormController']);
    Route::post('/login', [AdminLoginController::class, 'LoginController'])->name('admin.login');

    // Home/Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Class/Group
    Route::get('/groups', [GroupController::class, 'index'])->name('group');

    // Student/User
    Route::get('/users', [AdminUserController::class, 'index'])->name('user');

    // Documents
    Route::get('/documents', [DocumentController::class, 'index'])->name('document');

    // Exams
    Route::get('/exams', [ExamController::class, 'index'])->name('exam');

    // Notification
    Route::get('/notifications', [NotificationController::class, 'index'])->name('notification');

    // News
    Route::get('/news', [NewsController::class, 'index'])->name('news');

    // Categories
    Route::get('/categories', [CategoryController::class, 'index'])->name('category');

    // Quotes
    Route::get('/quotes', [QuoteController::class, 'index'])->name('quote');
});

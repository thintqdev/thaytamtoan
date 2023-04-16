<?php

use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\DashboardController;
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
// Router Authentication
Route::get('/login', [AdminLoginController::class, 'showLoginFormController']);
Route::post('/login', [AdminLoginController::class, 'LoginController'])->name('admin.login');

// Home/Dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'show'])->name('dashboard');

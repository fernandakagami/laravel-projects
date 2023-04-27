<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('/tasks', TasksController::class);

Route::get('/', function () {
    return redirect('/tasks');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('signin');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/signup', [SignupController::class, 'index'])->name('signup');
Route::post('/signup', [SignupController::class, 'store'])->name('register');

//Route::controller(LoginRegisterController::class)->group(function() {
    //Route::get('/register', 'register')->name('register');
    //Route::post('/store', 'store')->name('store');
    //Route::get('/login', 'login')->name('login');
    //Route::post('/authenticate', 'authenticate')->name('authenticate');
    //Route::get('/dashboard', 'dashboard')->name('dashboard');
    //Route::post('/logout', 'logout')->name('logout');
//});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatatanController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', [HomeController::class,'index'])->name('index');
Route::get('/login', [LoginController::class,'loginForm'])->name('login');
Route::post('/login', [LoginController::class,'loginAttempt'])->name('loginPost');
Route::get('/logout', [LoginController::class,'logout'])->name('logout');
Route::get('/register', [RegisterController::class,'registerForm'])->name('register');
Route::post('/register', [RegisterController::class,'registerAttempt'])->name('registerPost');

Route::get('/home', [CatatanController::class,'index'])->name('home');
Route::get('/home/create', [CatatanController::class,'create'])->name('home.create');
Route::post('/home/create', [CatatanController::class,'store'])->name('home.store');
Route::get('/home/edit/{catatan}', [CatatanController::class,'edit'])->name('home.edit');
Route::put('/home/edit/{catatan}', [CatatanController::class,'update'])->name('home.update');
Route::delete('/home/{catatan}', [CatatanController::class,'destroy'])->name('home.delete');

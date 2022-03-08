<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
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
    return view('home');
})->middleware('auth');

Route::get('/user', [UserController::class, 'index'])
    ->middleware('guest')
    ->name('user.index');

Route::get('user/signup', [UserController::class, 'toSignup'])
    ->middleware('guest')
    ->name('user.toSignup');

Route::post('user/signup', [UserController::class, 'signup'])
    ->name('user.signup');

Route::get('user/login', [UserController::class, 'toLogin'])
    ->middleware('guest')
    ->name('user.toLogin');

Route::post('user/login', [UserController::class, 'login'])
    ->name('user.login');

Route::get('/logout', [UserController::class, 'logout'])
    ->middleware('auth')
    ->name('user.logout');



Route::get('/admin', [AdminController::class, 'index'])
    ->middleware('auth')
    ->name('admin.index');

Route::get('/admin/student', [AdminController::class, 'toCreateStudent'])
    ->middleware('auth')
    ->name('admin.toCreateStudent');

Route::post('/admin/student', [AdminController::class, 'createStudent'])
    ->name('admin.createStudent');

Route::get('/admin/report', [AdminController::class, 'toReport'])
    ->middleware('auth')
    ->name('admin.toReport');

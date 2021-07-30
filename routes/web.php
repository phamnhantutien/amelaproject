<?php

use Illuminate\Support\Facades\Route;
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
    return view('admin.layout');
});

Route::prefix('admin')->group(function() {
    Route::get('/', function () {
        return view('admin.home');
    })->name('admin.home');

    Route::get('/login', [AdminController::class, 'showLogin'])->name('admin.showlogin');

    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');

    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

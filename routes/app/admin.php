<?php

use App\Http\Controllers\Core\Admin\AdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('admin.')->group(function () {
    //landing route
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::prefix('admin')->group(function () {
        //
    });
});
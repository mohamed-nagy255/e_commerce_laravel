<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Users\RoleController;
use App\Http\Controllers\Admin\Users\AdminController;
use App\Http\Controllers\Admin\Users\CustemorController;

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

Route::middleware(['auth', IsAdmin::class, 'verified'])->group(function () {
    # Home Page
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    # Users
    Route::controller(RoleController::class)->group(function () {
        Route::get('/dashboard/users/roles', 'index')->name('roles.index');
        Route::get('/dashboard/users/roles/create_role', 'create')->name('roles.create');
        Route::post('/dashboard/users/roles/store_role', 'store')->name('roles.store');
        Route::get('/dashboard/users/roles/show_role/{id}', 'show')->name('roles.show');
        Route::get('/dashboard/users/roles/edit_role/{id}', 'edit')->name('roles.edit');
        Route::patch('/dashboard/users/roles/update_role/{id}', 'update')->name('roles.update');
        Route::delete('/dashboard/users/roles/destroy_role', 'destroy')->name('roles.destroy');
    });
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard/users/admins', 'index')->name('admins.index');
        Route::post('/dashboard/users/admins/store_admin', 'store')->name('admin.store');
        Route::patch('/dashboard/users/admins/update_admin', 'update')->name('admin.update');
        Route::delete('/dashboard/users/admins/destroy_admin', 'destroy')->name('admin.destroy');
    });
    Route::controller(CustemorController::class)->group(function () {
        Route::get('/dashboard/users/custemors', 'index')->name('custemors.index');
        Route::post('/dashboard/users/custemors/create_custemor', 'store')->name('custemor.store');
        Route::patch('/dashboard/users/custemors/update_custemor', 'update')->name('custemor.update');
        Route::delete('/dashboard/users/custemors/destroy_custemor', 'destroy')->name('custemor.destroy');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DashboadController;
use App\Http\Controllers\ProfileController;


Route::middleware('auth')->group(function () {

    //dashboard
    Route::get('/dashboard', [DashboadController::class, 'dashboard'])->name('admin.dashboard'); 

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //usuarios role sy permisos
    Route::get('/user', [AdminController::class, 'userController'])->name('admin.usersList');
    Route::get('/permission', [AdminController::class, 'permissionsController'])->name('admin.permissionList');
    Route::get('/roles', [AdminController::class, 'roleController'])->name('admin.rolesList');

    //config
    Route::get('/country', [AdminController::class, 'countryController'])->name('admin.country');
    Route::get('/province', [AdminController::class, 'provinceController'])->name('admin.province');
});

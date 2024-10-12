<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {

    //Without auth
    Route::get('/login', [ProfileController::class, 'login'])->name('login');
    Route::post('/loging', [ProfileController::class, 'loging'])->name('loging');

    //With auth
    Route::middleware('admin_auth')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'dashView'])->name('dashboard');
        Route::post('/theme-setting/update', [DashboardController::class, 'themeSettingUpadate'])->name('theme_setting.update');

        // Profile
        Route::prefix('/profile')->name('profile.')->group(function () {
            Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');
            Route::get('/ecit', [ProfileController::class, 'edit'])->name('edit');
            Route::patch('/update', [ProfileController::class, 'update'])->name('update');
            Route::delete('/delete', [ProfileController::class, 'destroy'])->name('destroy');
        });
    });

});

//n

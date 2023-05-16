<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\
{   CityController, HomeController, PostController, RoleController,  UserController,
    ClientController, ContactController,SettingController, CategoryController, DonationController,
    PasswordController, GovernorateController
};

Auth::routes();
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function () {
    Route::get('/', [HomeController::class , 'index' ]);
    Route::resource('governorates', GovernorateController::class);
    Route::resource('cities', CityController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::resource('donations', DonationController::class);
    Route::resource('clients', ClientController::class);
    Route::get('clients/{client}/{status}', [ClientController::class, 'updateStatus'])->name('clients.status.update');
    Route::resource('contacts', ContactController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('users', UserController::class);
    Route::resource('change-passwords', PasswordController::class);
    Route::resource('roles', RoleController::class);
    Route::get('/logout', [HomeController::class , 'logout'])->name('logout.admins');
});

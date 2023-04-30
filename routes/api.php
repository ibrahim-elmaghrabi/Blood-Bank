<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\mobile\CityController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\mobile\ContactController;
use App\Http\Controllers\Mobile\SettingController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\mobile\BloodTypeController;
use App\Http\Controllers\Mobile\Auth\LoginController;
use App\Http\Controllers\mobile\GovernorateController;
use App\Http\Controllers\Api\Mobile\Auth\RegisterController;
use App\Http\Controllers\Api\Mobile\Auth\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);
Route::post('resetPassword', [ResetPasswordController::class, 'resetPassword']);
Route::put('newPassword', [ResetPasswordController::class, 'newPassword']);

Route::group(['middleware' => 'auth:sanctum' , 'prefix' => 'v1'], function () {
    Route::get('gov', [GovernorateController::class, 'index']);
    Route::get('cities', [CityController::class, 'index']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('bloodTypes', [BloodTypeController::class, 'index']);

    Route::resource('profile', Profile::class)->except('index', 'create', 'store', 'destroy');

    Route::resource('posts', PostController::class)->except('create', 'update', 'store', 'destroy', 'edit');
    Route::get('client_favorites/{id}', [PostController::class, 'favorites']);
    Route::get('toggle_favorite/{post}', [PostController::class, 'toggleFavorite']);

    Route::resource('donation_requests', DonationController::class)->except('create', 'edit', 'update', 'destroy');

    Route::post('notification_settings', [NotificationController::class, 'notificationSettings']);
    Route::post('register_token', [NotificationController::class, 'registerToken']);
    Route::post('remove_token', [NotificationController::class, 'removeToken']);

    Route::post('contacts', [ContactController::class ,'store']);

    Route::get('settings', [SettingController::class, 'index']);

    Route::post('logout', [LoginController::class, 'logout']);
});

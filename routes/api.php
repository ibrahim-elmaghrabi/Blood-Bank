<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\
{
     CityController, PostController, ProfileController, DonationController,  ContactController, CategoryController,
      BloodTypeController, GovernorateController, Auth\LoginController,Auth\RegisterController,
    };
use App\Http\Controllers\Api\NotificationController;

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

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('gov', [GovernorateController::class, 'index']);
    Route::get('cities', [CityController::class, 'index']);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('bloodTypes', [BloodTypeController::class, 'index']);
    
    Route::get('profile', [ProfileController::class, 'show']);
    Route::put('profile', [ProfileController::class, 'updateData']);
    Route::put('change_password', [ProfileController::class, 'changePassword']);

    Route::resource('posts', PostController::class)->except('create', 'update', 'store', 'destroy', 'show');
    Route::get('posts/client_favorites/{id}', [PostController::class, 'favorites']);
    Route::post('posts/toggle_favorites/{post}', [PostController::class, 'toggleFavorite']);

    Route::resource('donation_requests', DonationController::class)->except('create', 'edit', 'update', 'destroy');
    Route::post('contacts', [ContactController::class ,'store']);
    Route::post('notification_settings', [NotificationController::class, 'notificationSettings']);
    Route::post('register_token', [NotificationController::class, 'registerToken']);
    Route::post('remove_token', [NotificationController::class, 'removeToken']);
    Route::post('logout', [LoginController::class, 'logout']);
});

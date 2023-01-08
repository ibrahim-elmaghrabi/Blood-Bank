<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DonationController;
use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;

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
 


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('resetPassword', [AuthController::class, 'resetPassword']);
Route::post('newPassword', [AuthController::class, 'newPassword']);

Route::group(['middleware' => 'auth:sanctum' , 'prefix' => 'v1'], function () {
    Route::post('profile', [AuthController::class, 'profile']);
    Route::get('governorates', [MainController::class, 'governorates']);
    Route::get('cities', [MainController::class, 'cities']);
    Route::get('bloodTypes', [MainController::class, 'bloodTypes']);
    Route::get('posts', [PostController::class, 'posts']);
    Route::get('posts/{post}', [PostController::class, 'post']);
    Route::get('clientFavorites/{cid}', [PostController::class, 'favorites']);
    Route::get('toggleFavorite/{post}', [PostController::class, 'toggleFavorite']);
    Route::get('categories', [PostController::class, 'categories']);
    Route::get('donationRequests', [DonationController::class, 'donations']);
    Route::get('donationRequests/{donationRequest}', [DonationController::class, 'donation']);
    Route::post('donationRequests/create', [DonationController::class, 'createDonation']);
    Route::post('notificationSettings', [NotificationController::class, 'notificationSettings']);
    Route::post('register-token', [NotificationController::class, 'registerToken']);
    Route::post('remove-token', [NotificationController::class, 'removeToken']);
    Route::get('contacts', [MainController::class, 'contacts']);
    Route::post('message-contacts', [MainController::class ,'message']);
    Route::get('settings', [MainController::class, 'settings']);
    Route::post('logout', [AuthController::class, 'logout']);
});

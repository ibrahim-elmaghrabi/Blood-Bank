<?php
use App\Http\Controllers\Front\DonationController;
use App\Http\Controllers\Front\LoginClientController;
use App\Http\Controllers\Front\LogoutClientController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\PostController ;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Front\RegisterClientController;
use App\Http\Controllers\Front\ResetClientController;
use App\Http\Controllers\Web\AboutAppController;
use App\Http\Controllers\Web\AboutUsController;
use App\Http\Controllers\Web\ContactUsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();

Route::get('who-are-us', [FrontMainController::class, 'aboutUs']);
Route::get('about_blood_bank', AboutUsController::class);
Route::resource('contacts', ContactUsController::class)->except('index', 'update', 'show', 'edit', 'destroy');

Route::group(['namespace' => 'front'], function () {
    Route::get('/', [HomeController::class, 'home'])->name('clients.home');

    Route::post('toggle_fav', [FrontMainController::class, 'toggleFav']);

    Route::get('who_are_us', [FrontMainController::class, 'aboutUs']);


    Route::resource('donation_requests', DonationController::class)->except('destroy', 'edit', 'update');
    Route::post('fetch_city_donation', [DonationController::class, 'fetchCity']);

    Route::resource('posts', PostController::class)->except('create', 'store', 'update', 'destroy');


    Route::resource('profile', ProfileController::class)->except('index', 'create', 'store', 'show');
    Route::get('profile_change_password', [ProfileController::class, 'changePassword']);
    Route::put('profile_change_password/{client}', [ProfileController::class, 'updatePassword']);

    Route::get('articles_fav', [ProfileController::class , 'favoriteArticles']);


    Route::resource('account_create', RegisterController::class)->except('index', 'show', 'edit', 'update', 'destroy');

    Route::post('fetch_city', [RegisterClientController::class, 'fetchCity']);
    Route::post('account_create', [RegisterClientController::class, 'clientRegister']);
    Route::get('clients_web/login', [LoginClientController::class, 'clientLoginForm']);
    Route::post('clients_web/login', [LoginClientController::class, 'clientLogin']);
    Route::get('clients_reset_password', [ResetClientController::class, 'resetPage']);
    Route::put('clients_send_email', [ResetClientController::class, 'sendCode']);
    Route::put('client_reset_password', [ResetClientController::class, 'resetClientPassword']);

    Route::post('client_logout', [LogoutClientController::class, 'clientLogout']);
});



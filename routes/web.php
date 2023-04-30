<?php
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\Admin\GovernorateController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PasswordController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Front\DonationController as FrontDonationController;
use App\Http\Controllers\Front\LoginClientController;
use App\Http\Controllers\Front\LogoutClientController;
use App\Http\Controllers\Front\MainController as FrontMainController;
use App\Http\Controllers\Front\PostController as FrontPostController;
use App\Http\Controllers\Front\ProfileController;
use App\Http\Controllers\Front\RegisterClientController;
use App\Http\Controllers\Front\ResetClientController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Auth::routes();

Route::group(['namespace' => 'front'], function () {
    Route::get('/', [FrontMainController::class, 'home'])->name('clients.home');
    Route::post('toggle-fav', [FrontMainController::class, 'toggleFav'])->name('toggle-fav');
    Route::get('who-are-us', [FrontMainController::class, 'aboutUs'])->name('about_us');
    Route::get('contact-us', [FrontMainController::class, 'contactUs'])->name('contact-us');
    Route::get('about-BloodBank', [FrontMainController::class , 'aboutApp'])->name('about-app');
    Route::post('messages', [FrontMainController::class , 'ClientMessage'])->name('messages.store');
    Route::get('donation-requests', [FrontDonationController::class, 'index'])->name('donationRequests.index');
    Route::get('donation-requests/create', [FrontDonationController::class, 'addDonation'])
            ->name('donationRequests.add');
    Route::post('/fetchCity-donation', [FrontDonationController::class, 'fetchCity']);
    Route::post('donation-requests', [FrontDonationController::class ,'store'])->name('donationRequests.store');
    Route::get('donation-requests/{donationRequest}', [FrontDonationController::class ,'show'])
            ->name('donationRequests.show');
    Route::get('articles', [FrontPostController::class , 'index'])->name('articles');
    Route::get('articles/{id}', [FrontPostController::class, 'show'])->name('articles.show');
    Route::get('profile/{client}', [ProfileController::class, 'profile'])->name('clients.profile');
    Route::put('profile-update/{client}', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::get('profile-change-password', [ProfileController::class, 'changePassword'])
            ->name('profile-password.update');
    Route::put('profile-change-password/{client}', [ProfileController::class, 'updatePassword'])
            ->name('client-password.update');
    Route::get('articles-fav', [ProfileController::class , 'favoriteArticles'])->name('profile.articles');
    Route::get('account/create', [RegisterClientController::class, 'clientRegisterForm'])->name('account.create') ;
    Route::post('/fetchCity', [RegisterClientController::class, 'fetchCity'])->name('fetchCity') ;
    Route::post('account/create', [RegisterClientController::class, 'clientRegister'])->name('account.store') ;
    Route::get('clients-web/login', [LoginClientController::class, 'clientLoginForm'])->name('clients-web.login-page');
    Route::post('clients-web/login', [LoginClientController::class, 'clientLogin'])->name('clients-web.login');
    Route::get('clients-reset-password', [ResetClientController::class, 'resetPage'])->name('clients.reset') ;
    Route::put('clients-send-email', [ResetClientController::class, 'sendCode'])->name('clients-email.send');
    Route::put('client-reset-password', [ResetClientController::class, 'resetClientPassword'])
            ->name('clients.password.update');
    Route::post('client-logout', [LogoutClientController::class, 'clientLogout'])->name('client-logout');
});



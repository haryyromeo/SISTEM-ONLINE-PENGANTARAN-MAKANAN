<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenyuplaiMakananController;
use App\Http\Controllers\MengaturHargaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SellerProfileController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// login customer
Route::get('/login', [SessionController::class, 'showLoginForm'])->name('login');
Route::post('/login', [SessionController::class, 'login']);
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');

// dashboard customer
Route::get('/customer/dashboard', [CustomerController::class, 'dashboard'])
    ->name('customer.DashboardCustomer');

// REGISTER CUSTOMER
Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/customer/menu/{id}', [CustomerController::class, 'detailMenu'])
    ->name('customer.detailMenu');

Route::post('/customer/pesan-menu/{id_menu}', [CustomerController::class, 'pesanMenu'])
    ->name('customer.pesanMenu');

Route::get('/customer/orders', [CustomerController::class, 'listOrder'])->name('customer.listOrder');


Route::get('/customer/order/{id_order}', [CustomerController::class, 'detailOrder'])
    ->name('customer.detailOrder');



// ==========================
// SELLER REGISTER & LOGIN
// ==========================
Route::get('/registerSeller', [SellerController::class, 'showRegisterSeller'])->name('registerSeller');
Route::post('/registerSeller', [SellerController::class, 'registerSeller'])->name('registerSellerPost');

Route::get('/loginSeller', [SessionController::class, 'showLoginSeller'])->name('loginSeller');
Route::post('/loginSeller', [SessionController::class, 'loginSeller'])->name('loginSeller.post');
Route::post('/logoutSeller', [SessionController::class, 'logoutSeller'])->name('logoutSeller');

// ==========================
// SELLER DASHBOARD & PROFILE
// ==========================

    Route::get('/DashboardSeller', [SellerController::class, 'dashboard'])->name('DashboardSeller');
    Route::get('/seller/profile', [SellerController::class, 'profile'])->name('seller.profile');
    Route::get('/seller/profile/edit', [SellerController::class, 'editProfile'])->name('seller.profile.edit');
    Route::put('/seller/profile/update', [SellerController::class, 'updateProfile'])->name('seller.profile.update');

    // MENU CRUD
    Route::get('/seller/menu', [SellerController::class, 'menuList'])->name('sellerMenu');
    Route::get('/seller/menu/add', [SellerController::class, 'addMenu'])->name('addMenu');
    Route::post('/seller/menu/store', [SellerController::class, 'storeMenu'])->name('storeMenu');
    Route::get('/seller/menu/{id}/edit', [SellerController::class, 'editMenu'])->name('editMenu');
    Route::put('/seller/menu/update/{id}', [SellerController::class, 'updateMenu'])->name('seller.updateMenu');
    Route::get('/seller/menu/{id}/delete', [SellerController::class, 'deleteMenu'])->name('seller.deleteMenu');


Route::get('/DashboardSeller', [SellerController::class, 'dashboard']) ->name('DashboardSeller'); 

Route::get('/dashboard-driver', function () {
    return view('dashboardDriver');
})->name('DashboardDriver');


Route::get('/Home', function () {
    return view('Home');
});
Route::get('/login', [SessionController::class, 'showLoginForm'])->name('login');
Route::get('/loginDriver', [SessionController::class, 'showLoginDriver'])->name('loginDriver');
Route::post('/loginDriver', [SessionController::class, 'loginDriver']);
Route::get('/logoutDriver', [DriverController::class, 'logout'])->name('logoutDriver');
Route::get('/loginSeller', [SessionController::class, 'showLoginSeller'])->name('loginSeller');


// REGISTER DRIVER
Route::get('/registerDriver', [DriverController::class, 'showRegisterDriver'])->name('registerDriver');
Route::post('/registerDriver', [DriverController::class, 'registerDriver'])->name('registerDriverPost');


Route::get('/registerSeller', [SellerController::class, 'showRegisterSeller'])->name('registerSeller');
Route::post('/registerSeller', [SellerController::class, 'registerSeller'])->name('registerSellerPost');
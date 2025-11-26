<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenyuplaiMakananController;
use App\Http\Controllers\MengaturHargaController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});


// ========================== // CUSTOMER REGISTER & LOGIN // ==========================
// Tampilkan halaman register
Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [SessionController::class, 'showLoginForm'])->name('login');
Route::post('/login', [SessionController::class, 'login']);
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');


// ========================== // SELLER LOGIN & REGISTER // ==========================
Route::prefix('seller')->group(function () {
// Halaman Login Seller: /seller/login 
Route::get('/login', [SessionController::class, 'showLoginSeller'])->name('loginSeller'); 
// Proses Login Seller 
Route::post('/login', [SessionController::class, 'loginSeller'])->name('loginSeller.post'); });
// REGISTER SELLER 
Route::get('/registerSeller', [SellerController::class, 'showRegisterSeller']) ->name('registerSeller'); 
Route::post('/registerSeller', [SellerController::class, 'registerSeller']) ->name('registerSellerPost');

Route::post('/logoutSeller', [App\Http\Controllers\SellerController::class, 'logout'])
    ->name('logoutSeller');


// ========================== // MENU & ORDER // ==========================
Route::get('/menu/seller/{sellerId}', [MenuController::class, 'listMenusBySeller']); 
Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('order.place'); 
Route::post('/order/cancel/{orderId}', [OrderController::class, 'cancelOrder']); 
Route::get('/order/track/{orderId}', [OrderController::class, 'trackOrder'])->name('order.track');



Route::get('/DashboardCustomer', function () {
    return view('DashboardCustomer');
});

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

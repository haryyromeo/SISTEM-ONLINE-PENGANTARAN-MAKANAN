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


// Tampilkan halaman register
Route::get('/register', [RegisterController::class, 'showForm'])->name('register.form');

// Simpan data register
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/login', [SessionController::class, 'showLoginForm'])->name('login');
Route::post('/login', [SessionController::class, 'login']);
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');


Route::get('/menu/seller/{sellerId}', [MenuController::class, 'listMenusBySeller']);
Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('order.place');
Route::post('/order/cancel/{orderId}', [OrderController::class, 'cancelOrder']);
Route::get('/order/track/{orderId}', [OrderController::class, 'trackOrder'])->name('order.track');
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
Route::get('/payment/status/{paymentId}', [PaymentController::class, 'checkPaymentStatus']);


Route::get('/seller/{sellerId}/profile', [SellerController::class, 'getSellerProfile']);
Route::post('/seller/{sellerId}/profile', [SellerController::class, 'updateSellerProfile']);
Route::get('/seller/{sellerId}/menus', [SellerController::class, 'manageSellerMenu']);
Route::post('/menu/create', [MenuController::class, 'createMenu']);
Route::post('/menu/update/{menuId}', [MenuController::class, 'updateMenu']);
Route::post('/menu/delete/{menuId}', [MenuController::class, 'deleteMenu']);


Route::get('/driver/{driverId}', [DriverController::class, 'getDriverDetails']);
Route::post('/driver/status/{driverId}', [DriverController::class, 'updateDriverStatus']);
Route::post('/delivery/assign/{deliveryId}/{driverId}', [DeliveryController::class, 'assignDriverToDelivery']);
Route::post('/delivery/status/{deliveryId}', [DeliveryController::class, 'updateDeliveryStatus']);
Route::post('/delivery/confirm/{deliveryId}', [DeliveryController::class, 'confirmDelivery']);


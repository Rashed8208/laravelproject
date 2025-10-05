<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemTagController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
// customer
use App\Http\Controllers\Customer\CustomerAuthController;
use App\Http\Controllers\Customer\CustomerDashboardController;
use App\Http\Controllers\Customer\CustomerOrderController;
use App\Http\Controllers\PaymentController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

      Route::get('/',[frontendController::class,'home'])->name('home');
      Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
      Route::get('about',[frontendController::class, 'about'])->name('about');
      Route::get('product',[frontendController::class, 'product'])->name('product');
      Route::get('electronic',[frontendController::class, 'electronic'])->name('electronic');
      Route::get('cloth',[frontendController::class, 'cloth'])->name('cloth');
      Route::get('furniture',[frontendController::class, 'furniture'])->name('furniture');
      Route::get('blog',[frontendController::class, 'blog'])->name('blog');
      Route::get('cart',[CartController::class,'viewCart'])->name('cart.view');
      Route::post('cart/add',[CartController::class,'addToCart'])->name('cart.add');
      Route::post('cart/update',[CartController::class,'updateCart'])->name('cart.update');
      Route::get('cart/remove/{id}',[CartController::class,'removeFromCart'])->name('cart.remove');
      Route::post('cart/check_coupon',[CartController::class,'checkCoupon'])->name('cart.check_coupon');
      Route::get('checkout',[CheckoutController::class, 'checkout'])->name('checkout');
      Route::post('checkout/place_order',[CheckoutController::class,'placeOrder'])->name('checkout.place_order');

      Auth::routes();
      Route::middleware('auth:web')->group(function(){
      Route:: resource('tag',TagController::class);
      Route:: resource('category',CategoryController::class);
      Route:: resource('item',ItemController::class);
      Route:: resource('item_tag',ItemTagController::class);
      Route:: resource('customer',CustomerController::class);
      Route:: resource('order',OrderController::class);
      Route:: resource('order_item',OrderItemController::class);
      Route:: resource('notification',NotificationController::class);
      Route:: resource('review',ReviewController::class);
      Route:: resource('coupon',CouponController::class);

      });
      // Customer Authentication Routes
    Route::prefix('customer_panel')->group(function () {
        Route::get('login', [CustomerAuthController::class, 'showLoginForm'])->name('customer.login');
        Route::post('login', [CustomerAuthController::class, 'login'])->name('customer.login.submit');
        Route::get('register', [CustomerAuthController::class, 'showRegistrationForm'])->name('customer.register');
        Route::post('register', [CustomerAuthController::class, 'register'])->name('customer.register.submit');
        Route::post('logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');

        // Protected customer routes
        Route::middleware('auth:customer')->group(function () {
            Route::get('dashboard', [CustomerDashboardController::class, 'index'])->name('customer_panel.dashboard');
            Route:: resource('order',CustomerOrderController::class, ['as' => 'customer_panel']);
        });

    

     Route::get('customer_panel/checkout/{order}', [CheckoutController::class, 'show'])->name('checkout');

        Route::post('/pay', [PaymentController::class, 'pay'])->name('order.pay');

        // SSLCommerz callback routes
        Route::post('/ssl/success', [PaymentController::class, 'success'])->name('ssl.success');
        Route::post('/ssl/fail', [PaymentController::class, 'sslFail'])->name('ssl.fail');
        Route::post('/ssl/cancel', [PaymentController::class, 'sslCancel'])->name('ssl.cancel');
        Route::post('/ssl/ipn', [PaymentController::class, 'sslIPN'])->name('ssl.ipn');

    });




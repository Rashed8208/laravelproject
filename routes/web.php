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

      Route::get('/',[frontendController::class,'home'])->name ('home');
      Route::get('dashboard',[DashboardController::class, 'index'])->name('dashboard');
      Route::get('about',[frontendController::class, 'about'])->name('about');
      Route::get('product',[frontendController::class, 'product'])->name('product');
      Route::get('electronic',[frontendController::class, 'electronic'])->name('electronic');
      Route::get('cloth',[frontendController::class, 'cloth'])->name('cloth');
      Route::get('furniture',[frontendController::class, 'furniture'])->name('furniture');
      Route::get('blog',[frontendController::class, 'blog'])->name('blog');
      Route::get('cart',[CartController::class, 'cart'])->name('cart');
      Route::get('checkout',[CheckoutController::class, 'checkout'])->name('checkout');


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
      Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
      });




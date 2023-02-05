<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\TestimonialControlller;
use App\Http\Controllers\Frontend\Auth\RegisterController;
use App\Http\Controllers\Backend\CustomerController as BackendCustomerController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Admin Auth Route

Route::group(['prefix' => 'admin/', 'as' => 'admin.'],function(){
    Route::get('login',[LoginController::class, 'loginPage'])->name('loginpage');
    Route::post('login',[LoginController::class, 'login'])->name('login');

    Route::middleware(['auth','is_admin'])->group(function(){
        Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
        Route::get('logout',[LoginController::class, 'logout'])->name('logout');

        Route::resource('/category',CategoryController::class);
        Route::resource('/subCategory',SubCategoryController::class);
        Route::resource('/testimonial',TestimonialControlller::class);
        Route::resource('/products',ProductController::class);
        Route::resource('/banner',BannerController::class);
        Route::resource('/coupon',CouponController::class);

        Route::get('/order-list',[OrderController::class,'index'])->name('order.list');
        Route::get('/customer-list',[BackendCustomerController::class,'index'])->name('customer.list');
        //setting
        Route::get('/setting',[SettingController::class,'index'])->name('setting.index');
        Route::post('/setting-store',[SettingController::class,'store'])->name('setting.store');
    });

});


// End Admin Auth Route


Route::prefix('')->group(function(){
    Route::get('/',[HomeController::class,'home'])->name('home');
    Route::get('/shop',[HomeController::class,'shop'])->name('shop');
    Route::get('/single-product/{product_slug}',[HomeController::class,'productDetails'])->name('productDetails.page');
    Route::get('/shopping-cart',[CartController::class,'cartPage'])->name('cart.page');
    Route::post('/add-to-cart',[CartController::class,'addToCart'])->name('addToCart');
    Route::get('/remove-from-cart/{cart_id}',[CartController::class,'removeFromCart'])->name('removeFromCart');

    /*Authentication routes for Customer/Guest */
    Route::get('/register', [RegisterController::class, 'registerPage'])->name('register.page');
    Route::post('/register', [RegisterController::class, 'registerStore'])->name('register.store');
    Route::get('/login', [RegisterController::class, 'loginPage'])->name('login.page');
    Route::post('/login', [RegisterController::class, 'loginStore'])->name('login.store');

    Route::prefix('customer/')->middleware(['auth','is_customer'])->group(function(){
        Route::get('dashboard',[CustomerController::class, 'dashboard'])->name('customer.dashboard');
        Route::get('logout', [RegisterController::class, 'logout'])->name('customer.logout');
        //coupon code apply
        Route::post('cart/apply-coupon', [CartController::class, 'couponApply'])->name('customer.couponApply');
        Route::get('cart/remove-coupon/{coupon_name}', [CartController::class, 'removeCoupon'])->name('customer.couponremove');

         /*Checkout Page */
        Route::get('checkout', [CheckoutController::class, 'checkoutPage'])->name('customer.checkoutpage');
        Route::post('placeorder', [CheckoutController::class, 'placeOrder'])->name('customer.placeorder');
    });

    /*AJAX Call */
    Route::get('/upzilla/ajax/{district_id}', [CheckoutController::class, 'loadUpazillaAjax'])->name('loadupazila.ajax');

});

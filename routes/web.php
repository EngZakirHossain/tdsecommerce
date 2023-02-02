<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\TestimonialControlller;

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
    Route::get('logout',[LoginController::class, 'logout'])->name('logout');

    Route::middleware('auth')->group(function(){
        Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    });
    Route::resource('/category',CategoryController::class);
    Route::resource('/subCategory',SubCategoryController::class);
    Route::resource('/testimonial',TestimonialControlller::class);
    Route::resource('/products',ProductController::class);
    Route::resource('/banner',BannerController::class);
    Route::resource('/coupon',CouponController::class);
});


// End Admin Auth Route


Route::prefix('')->group(function(){
    Route::get('/',[HomeController::class,'home'])->name('home');
    Route::get('/shop',[HomeController::class,'shop'])->name('shop');
    Route::get('/single-product/{product_slug}',[HomeController::class,'productDetails'])->name('productDetails.page');
    Route::get('/shopping-cart',[CartController::class,'cartPage'])->name('cart.page');
    Route::post('/add-to-cart',[CartController::class,'addToCart'])->name('addToCart');
    Route::get('/remove-from-cart/{cart_id}',[CartController::class,'removeFromCart'])->name('removeFromCart');

});

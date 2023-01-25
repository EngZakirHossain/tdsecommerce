<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;

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
});


// End Admin Auth Route


Route::get('/', function () {
    return view('frontend.pages.home');
});

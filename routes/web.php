<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

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
Route::post('/start', [\App\Http\Controllers\ExampleController::class,'getUserDetails'])->name('getUserDetails');
Route::get('/start', [\App\Http\Controllers\ExampleController::class,'showPage'])->name('showPage');

Route::get('/', [SessionController::class,'home'])->name('home');

/******************* USER AUTHENTICATION *******************/
Route::get('/register', [\App\Http\Controllers\UserController::class,'create'])->name('create_user');

Route::post('/register', [\App\Http\Controllers\UserController::class,'store'])->name('store_user');

Route::get('/login', [\App\Http\Controllers\UserController::class,'login'])->name('login')->middleware('guest');

Route::post('/login', [\App\Http\Controllers\UserController::class,'verify'])->name('login');

Route::get('/logout', [\App\Http\Controllers\UserController::class, 'logout'])->name('logout');

/******************** DASHBOARD ROUTES *******************/
Route::get('/dashboard', [\App\Http\Controllers\UserController::class,'dashboard'])->name('dashboard');
Route::post('/dashboard', [\App\Http\Controllers\UserController::class,'edit_details'])->name('edit_details');

/******************** PRODUCT ROUTES **********************/

Route::get('/shop', [\App\Http\Controllers\ProductController::class, 'index'])->name('show_product');
Route::get('/shop/{id}/like', [LikeController::class,'like'])->name('liked');

Route::get('/shop/category/{category}', [\App\Http\Controllers\ProductController::class, 'productCategory'])->name('productCategory');

Route::get('/shop/{product}', [ProductController::class, 'detail'])->name('product_details');
Route::post('/shop/{product}',[SessionController::class, 'saveRating'])->name('save_rating');

Route::get('/product/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('create_product');

Route::post('/product/create', [\App\Http\Controllers\ProductController::class, 'store'])->name('store_product');


/******************** CATEGORY ROUTES**********************/

Route::get('/category/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('create_category');

Route::post('/category/create', [\App\Http\Controllers\CategoryController::class, 'store'])->name('store_category');



/********************* SESSION ROUTES**********************/
Route::get('/cart', [CartController::class,'index']);

Route::get('/add-to-cart/{product}', [CartController::class,'add_to_cart'])->name('add_to_cart');

Route::get('/cart/clear', [CartController::class, 'clear_cart'])->name('clear_cart');
Route::get('/cart/remove/{product}', [CartController::class, 'remove_item'])->name('remove_item');

// Route::post('/cart', [CartController::class,'store'])->name('save_session');




Route::get('/checkout', [\App\Http\Controllers\AppController::class,'checkout'])->name('checkout');
Route::get('/pay', [\App\Http\Controllers\AppController::class, 'make_payment'])->name('pay');
Route::get('/pay/callback', [\App\Http\Controllers\AppController::class,'payment_callback'])->name('pay.call');


Route::get('/rate', [\App\Http\Controllers\FilteringController::class,'used']);

/************************* Search ************************/

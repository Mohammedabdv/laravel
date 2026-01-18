<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LocalController;
use App\Http\Controllers\ContactController;
use App\Models\Product;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');




Route::get('/', [ProductController::class, 'index']);

Route::get('/category', [CategoryController::class,'index']);

Route::get('/category/{catid}', [CategoryController::class,'show']);

Route::get('/addproduct', [ProductController::class,'addproduct']);

Route::get('/deleteproduct/{productid}',[ProductController::class,'deleteproduct']);

Route::get('/editproduct/{productid}',[ProductController::class,'editproduct']);

Route::post('/storeproduct', [ProductController::class,'storeproduct']);

Route::get('/addcategory', [CategoryController::class,'addcategory']);

Route::get('/editcategory/{categoryid}',[CategoryController::class,'editcategory']);

Route::post('/storecategory', [CategoryController::class,'storecategory']);

Route::get('/reviews', [ReviewsController::class,'reviews']);

Route::post('/storereview', [ReviewsController::class,'storereview']);

Route::get('/search', [ProductController::class,'search'])->name('search');


Route::get('/productsTable', [ProductController::class,'productsTable'])->name('productsTable');


Route::get('/cart', [CartController::class,'cart'])->name('cart')->middleware('auth');

Route::get('/addproducttocart/{productid}', [CartController::class,'Addproducttocart'])->name('addproducttocart')->middleware('auth');

Route::get('/deletecart/{cartid}', [CartController::class,'deletecart'])->name('deletecart')->middleware('auth');


Route::get('/addproductphoto/{productid}', [ProductController::class,'addproductphoto']);

Route::get('/deleteproductphoto/{photoid}', [ProductController::class,'deleteproductphoto']);


Route::post('/storeproductphoto', [ProductController::class,'storeproductphoto']);


Route::get('/productDetails/{productid}', [ProductController::class,'productDetails'])->name('productDetails');

Route::get('/checkout', [CartController::class,'checkout'])->middleware('auth');

Route::post('/storecheckout', [OrderController::class,'storecheckout'])->middleware('auth');

Route::get('/history', [OrderController::class,'index'])->middleware('auth');


Route::get('/lang/{lang}',[LocalController::class,'changeLanguage'])->name('changlang');


Route::get('/admin', function () {
    return 'admin panel';
}) ->middleware( 'checkrole');

Route::get('/contact' , [ContactController::class,'index']);

Route::post('/contact' , [ContactController::class,'store']);

Route::get('/deletecategory/{categoryid}',[CategoryController::class,'deletecategory']);

Route::get('/categoriesTable', [CategoryController::class,'categoriesTable'])->name('categoriesTable');

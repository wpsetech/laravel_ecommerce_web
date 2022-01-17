<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/',[\App\Http\Controllers\frontend\FrontendController::class,'index']);
Route::get('view{pro_slug}',[\App\Http\Controllers\frontend\FrontendController::class,'tpview']);
Route::get('category',[\App\Http\Controllers\frontend\FrontendController::class,'category']);
Route::get('view-category/{slug}',[\App\Http\Controllers\frontend\FrontendController::class,'viewcategory']);
Route::get('featured-category/{slug}',[\App\Http\Controllers\frontend\FrontendController::class,'viewfecategory']);
Route::get('allproducts',[\App\Http\Controllers\frontend\FrontendController::class,'allproducts']);
Route::get('view{pro_slug}',[\App\Http\Controllers\frontend\FrontendController::class,'allproductsview']);
Route::get('categories/{cate_slug}/{prod_slug}',[\App\Http\Controllers\frontend\FrontendController::class,'productview']);

///cart///

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function (){
    Route::post('/add-to-cart/',[\App\Http\Controllers\cartController::class,'addtoCart'])->name('addtoCart');
    Route::get('cart',[\App\Http\Controllers\cartController::class,'viewcart']);
    Route::get('delete-cart-item',[\App\Http\Controllers\cartController::class,'deletecart'])->name('deletecart');
    Route::get('checkout',[\App\Http\Controllers\CheckoutController::class,'checkout']);
    Route::post('place-order',[\App\Http\Controllers\CheckoutController::class,'placeorder']);
    Route::get('my-orders',[\App\Http\Controllers\UserController::class,'index']);
    Route::get('view-order/{id}',[\App\Http\Controllers\UserController::class,'view']);
    Route::get('delete-order/{id}',[\App\Http\Controllers\UserController::class,'delete']);
    Route::get('wishlist',[\App\Http\Controllers\WishlistController::class,'index']);
    Route::post('/add-to-wishlist',[\App\Http\Controllers\WishlistController::class,'addtoWishlist']);
    Route::get('delete-wishlist-item',[\App\Http\Controllers\WishlistController::class,'deletewishlist']);

//    Route::get('stripe', [\App\Http\Controllers\stripeController::class, 'stripe']);
//    Route::post('stripe', [\App\Http\Controllers\stripeController::class, 'stripePost'])->name('stripe.post');

    Route::post('/',[\App\Http\Controllers\stripeController::class,'index']);
    Route::get('/success',[\App\Http\Controllers\stripeController::class,'success']);
    Route::get('/cancel',[\App\Http\Controllers\stripeController::class,'cancel']);



});



Route::middleware(['auth','isAdmin'])->group(function (){
    Route::get('/dashboard', function () {
        return view('admin.index');
    });
    ///categories route
    Route::get('categories',[\App\Http\Controllers\categoryController::class, 'category'])->name('categories');
    Route::get('category/add',[\App\Http\Controllers\categoryController::class, 'addCat'])->name('add.category');
    Route::post('category/insert',[\App\Http\Controllers\categoryController::class, 'insertCat'])->name('insert.category');
    Route::get('category/edit/{id}',[\App\Http\Controllers\categoryController::class,'editCat']);
    Route::post('category/update/{id}',[\App\Http\Controllers\categoryController::class,'updateCat']);
    Route::get('category/delete/{id}',[\App\Http\Controllers\categoryController::class,'deleteCat']);

///products route
    Route::get('products',[\App\Http\Controllers\productController::class,'product'])->name('products');
    Route::get('products/add',[\App\Http\Controllers\productController::class, 'addProduct'])->name('add.products');
    Route::post('products/insert',[\App\Http\Controllers\productController::class, 'insertProduct'])->name('insert.product');
    Route::get('product/edit/{id}',[\App\Http\Controllers\productController::class, 'editProduct']);
    Route::post('product/update/{id}',[\App\Http\Controllers\productController::class,'updateProduct']);
    Route::get('product/delete/{id}',[\App\Http\Controllers\productController::class,'deleteProduct']);


    /////orders route
    Route::get('orders',[\App\Http\Controllers\OrderController::class,'index']);
    Route::get('admin/view-order/{id}',[\App\Http\Controllers\OrderController::class,'view']);
    Route::put('update-order/{id}',[\App\Http\Controllers\OrderController::class,'updateorder']);
    Route::get('order-history',[\App\Http\Controllers\OrderController::class,'orderhistory']);


    Route::get('users',[\App\Http\Controllers\DashboardController::class,'users']);
    Route::get('view-user/{id}',[\App\Http\Controllers\DashboardController::class,'viewuser']);

});



///contact//
Route::post('contact',[\App\Http\Controllers\frontend\FrontendController::class,'contact_email']);






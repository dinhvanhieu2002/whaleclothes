<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
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

//Frontend
Route::get('/', [HomeController::class, 'index']);
Route::get('/loadmore', [HomeController::class, 'loadMore'])->name('product.load');




//user
Route::get('/login', [UserController::class, 'show_login']);
Route::get('/signup', [UserController::class, 'show_signup']);
Route::post('/execute-login', [UserController::class, 'login']);
Route::post('/execute-signup', [UserController::class, 'signup']);
Route::get('/logout', [UserController::class, 'logout']);



//product
Route::get('/category/{category_id}', [CategoryController::class, 'show_category_product'])->where('category_id', '[0-9]+');
Route::get('/brand/{brand_id}', [BrandController::class, 'show_brand_product'])->where('brand_id', '[0-9]+');
Route::get('/products', [ProductController::class, 'show_product']);
Route::get('/product-detail/{product_id}', [ProductController::class, 'show_product_detail'])->where('product_id', '[0-9]+');
Route::get('/gender/{gender}', [GenderController::class, 'show_product_gender'])->where('gender', '[a-z]+');


//comment
Route::get('/load-comment', [CommentController::class, 'load_comment'])->name('comment.load');
Route::post('/add-comment', [CommentController::class, 'add_comment'])->name('comment.add');

//cart
Route::get('/add-to-cart', [CartController::class, 'add_to_cart']);
Route::get('/cart', [CartController::class, 'show_cart']);
Route::post('/update-cart', [CartController::class, 'update_cart']);
Route::get('/delete-cart/{cart_id}', [CartController::class, 'delete_cart'])->where('cart_id', '[0-9]+');

//checkout
Route::get('/checkout', [CheckoutController::class, 'show_checkout']);
Route::post('/save-checkout', [CheckoutController::class, 'save_checkout']);


//payment
Route::get('/save-payment', [PaymentController::class, 'save_payment']);

//order


//shipping
Route::post('/save-shipping', [ShippingController::class, 'save_shipping']);
Route::post('/delete-shipping', [ShippingController::class, 'delete_shipping']);


//search
Route::get('/search', [SearchController::class, 'load_search'])->name('search.live');


// ----------------------------------------------------------------------------------------

//Backend
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::get('/logout-admin', [AdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);


//Category product
Route::get('/add-category-product', [CategoryController::class, 'add_category_product']);
Route::get('/all-category-product', [CategoryController::class, 'all_category_product']);
Route::post('/save-category-product', [CategoryController::class, 'save_category_product']);
Route::post('/update-category-product', [CategoryController::class, 'update_category_product']);
Route::post('/delete-category-product', [CategoryController::class, 'delete_category_product']);

//Brand product
Route::get('/add-brand-product', [BrandController::class, 'add_brand_product']);
Route::get('/all-brand-product', [BrandController::class, 'all_brand_product']);
Route::post('/save-brand-product', [BrandController::class, 'save_brand_product']);
Route::post('/update-brand-product', [BrandController::class, 'update_brand_product']);
Route::post('/delete-brand-product', [BrandController::class, 'delete_brand_product']);

//Product
Route::get('/add-product', [ProductController::class, 'add_product']);
Route::get('/all-product', [ProductController::class, 'all_product']);
Route::post('/save-product', [ProductController::class, 'save_product']);
Route::post('/update-product', [ProductController::class, 'update_product']);
Route::post('/delete-product', [ProductController::class, 'delete_product']);
Route::get('/size-by-product', [ProductController::class, 'size_by_product']);

//order
Route::get('/all-order', [OrderController::class, 'all_order']);
Route::post('/update-order', [OrderController::class, 'update_order']);
Route::get('/order/{order_id}', [OrderController::class, 'order_detail'])->where('order_id', '[0-9]+');
Route::get('/shipping-address/{shipping_id}', [ShippingController::class, 'shipping_address'])->where('shipping_id', '[0-9]+');







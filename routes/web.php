<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\SubscriberController;

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

// Route::get('/', function () {
//     return view('welcome');
// })
Route::get('/',[FrontendController::class,'index'])->name('index');
Route::get('/category/product/{id}',[FrontendController::class,'category_product'])->name('category.product');
Route::get('/subcategory/product/{id}',[FrontendController::class,'subcategory_product'])->name('subcategory.product');
Route::get('/product/details/{slug}',[FrontendController::class,'product_details'])->name('product.details');
Route::post('/getSize',[FrontendController::class,'getSize']);
Route::post('/getQuantity',[FrontendController::class,'getQuantity']);
Route::get('/shop',[FrontendController::class,'shop'])->name('shop');
Route::get('/about',[FrontendController::class,'about'])->name('about');
Route::get('/faq',[FrontendController::class,'faq'])->name('faq');

Route::get('/dashboard', [HomeController::class,'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//Admin Profile Introduce

Route::get('/user/profile',[HomeController::class,'user_profile'])->name('user,profile');
Route::post('/user/profile/update',[HomeController::class,'user_profile_update'])->name('user.profile.update');
Route::post('/user/password/update',[HomeController::class,'user_password_update'])->name('user.password.update');
Route::post('/user/profile/photo',[HomeController::class,'user_profile_photo'])->name('user.profile.photo');

//User list
Route::get('/user/list',[UserController::class,'user_list'])->name('user.list');
Route::get('/user/remove/{user_id}',[UserController::class,'user_remove'])->name('user.remove');

//Categoty
Route::get('/category',[CategoryController::class,'category'])->name('category');
Route::post('/category/store',[CategoryController::class,'category_store'])->name('category.store');
Route::get('/category/edit{id}',[CategoryController::class,'category_edit'])->name('category.edit');
Route::post('/category/update',[CategoryController::class,'category_update'])->name('category.update');
Route::get('/category/softdelete/{id}',[CategoryController::class,'category_softdelete'])->name('category.softdelete');
Route::get('/category/trash',[CategoryController::class,'category_trash'])->name('category.trash');
Route::get('/category/restore/{id}',[CategoryController::class,'category_restore'])->name('category.restort');
Route::get('category/hard/delete/{id}',[CategoryController::class,'category_hard_delete'])->name('category.hard.delete');
Route::post('/category/delete/checked',[CategoryController::class,'category_delete_checked'])->name('category.delete.checked');
Route::post('/category/trash/restore',[CategoryController::class,'category_trash_restore'])->name('category.trash.restore');


// Sub Category
Route::get('/subcategory',[SubcategoryController::class,'subcategory'])->name('subcategory');
Route::post('/subcategory/store',[SubcategoryController::class,'subcategory_store'])->name('subcategory.store');
Route::get('/subcategory/edit/{id}',[SubcategoryController::class,'subcategory_edit'])->name('subcategory.edit');
Route::post('/subcategory/update/{id}',[SubcategoryController::class,'subcategory_update'])->name('subcategory.update');
Route::get('/subcategory/delete/{id}',[SubcategoryController::class,'subcategory_delete'])->name('subcategory.delete');

//Brand
Route::get('/brand',[BrandController::class,'brand'])->name('brand');
Route::post('/brand/store',[BrandController::class,'brand_store'])->name('brand.store');
Route::get('/brand/edit/{id}',[BrandController::class,'brand_edit'])->name('brand.edit');
Route::post('/brand/update/{id}',[BrandController::class,'brand_update'])->name('brand.update');
Route::get('/brand/delete/{id}',[BrandController::class,'brand_delete'])->name('brand.delete');


//Product
Route::get('/product',[ProductController::class,'product_index'])->name('add.product');
Route::post('/getSubcategory',[ProductController::class,'getsubcategory']);
Route::post('/product/store',[ProductController::class,'product_store'])->name('product.store');
Route::get('/product/list',[ProductController::class,'product_list'])->name('product.list');
Route::get('/product/show/{id}',[ProductController::class,'product_show'])->name('product.show');
Route::get('/product/delete/{id}',[ProductController::class,'product_delete'])->name('product.delete');
Route::post('/changeStatus',[ProductController::class.'changeStatus']);

//Product Inventory
Route::get('/product/inventory',[InventoryController::class,'inventory'])->name('inventory');
Route::post('/color/store',[InventoryController::class,'color_store'])->name('color.store');
Route::post('/size/store',[InventoryController::class,'size_store'])->name('size.store');
Route::get('/color/remove/{id}',[InventoryController::class,'color_remove'])->name('color.remove');
Route::get('/size/remove/{id}',[InventoryController::class,'size_remove'])->name('size.remove');
Route::get('/product/inventory/{id}',[InventoryController::class,'product_inventory'])->name('product.inventory');
Route::post('product/inventory/store/{id}',[InventoryController::class,'inventory_store'])->name('inventory.store');
Route::get('/inventory/delete/{id}', [InventoryController::class, 'inventory_delete'])->name('inventory.delete');

//Customer Details
Route::get('/customer/login',[CustomerAuthController::class,'customer_login'])->name('customer.login');
Route::get('/customer/register',[CustomerAuthController::class,'customer_register'])->name('customer.register');
Route::post('/customer/store',[CustomerAuthController::class,'customer_store'])->name('customer.store');
Route::post('/customer/login/confirm',[CustomerAuthController::class,'customer_confirmation_login'])->name('customer.confirmation.login');
Route::get('/customer/profile',[CustomerController::class,'customer_profile'])->name('customer.profile')->middleware('customer');
Route::get('/customer/logout',[CustomerController::class,'customer_logout'])->name('customer.logout');
Route::post('/customer/profile/update',[CustomerController::class,'customer_profile_update'])->name('customer.profile.update');
Route::get('/customer/order',[CustomerController::class,'customer_order'])->name('customer.order');
Route::get('/customer/order/invoice/download{id}',[CustomerController::class,'order_invoice_downlaod'])->name('order.invoice.download');
Route::get('/cancel/myorder/{id}',[CustomerController::class,'cancel_myorder'])->name('cancel.myorder');

//cart
Route::post('/cart/store',[CartController::class,'cart_store'])->name('cart.store');
Route::get('/cart/remove/{id}',[CartController::class,'cart_remove'])->name('cart.remove');
Route::get('/cart',[CartController::class,'cart'])->name('cart');
Route::post('/cart/update',[CartController::class,'cart_update'])->name('cart.update');

//Coupon
Route::get('/coupon',[CouponController::class,'index'])->name('coupon');
Route::post('/coupon/store',[CouponController::class,'coupon_store'])->name('coupon.store');
Route::get('coupon/delete/{id}',[CouponController::class,'coupon_delete'])->name('coupon.delete');

//Check Out
Route::get('/checkout',[CheckoutController::class,'checkout'])->name('checkout');
Route::post('/getCity',[CheckoutController::class,'getCity']);
Route::post('/order/store',[CheckoutController::class,'order_store'])->name('order.store');
Route::get('/order/success',[CheckoutController::class,'order_success'])->name('order.success');

//Admin order details
Route::get('/admin/order',[OrderController::class,'admin_order'])->name('admin.order');
Route::post('/order/status/update',[OrderController::class,'order_status_update'])->name('order.status.update');
Route::get('/order/cancel/request',[OrderController::class,'order_cancel_request'])->name('order.cancel.request');


// SSLCOMMERZ Start
Route::get('/pay', [SslCommerzPaymentController::class, 'index'])->name('pay');
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

//Reviwe
Route::post('/review/store',[FrontendController::class,'review_store'])->name('review.store');
//Subscribar
Route::get('/subscribar',[SubscriberController::class,'subscribar'])->name('subscribar');
Route::post('/subscribar/store',[SubscriberController::class,'subscribar_store'])->name('subscribar.store');
Route::get('/send/newsletter/{id}',[SubscriberController::class,'send_newsletter'])->name('send.newsletter');

//Password Reset System
Route::get('password/reset',[PasswordResetController::class,'password_reset'])->name('password.reset');
Route::post('/password/reset/request',[PasswordResetController::class,'passwordreset_request'])->name('passwordreset.request');
Route::get('/password/reset/form/{token}',[PasswordResetController::class,'passwordreset_form'])->name('passwordreset.form');
Route::post('/password/reset/confirm/{token}',[PasswordResetController::class,'password_reset_confirm'])->name('password.reset.confirm');

//Email Verification
Route::get('/email/verification/{token}',[CustomerAuthController::class,'email_verification'])->name('email.verification');

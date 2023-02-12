<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\back\CategoryController;
use App\Http\Controllers\back\ProductController;
use App\Http\Controllers\back\BrandController;
use App\Http\Controllers\back\BannerController;
use App\Http\Controllers\back\SellerController;
use App\Http\Controllers\back\CollectionController;
use App\Http\Controllers\back\HomeController;
use App\Http\Controllers\back\OrderController;
use App\Http\Controllers\back\SliderController;
use App\Http\Controllers\back\PlaceController;
use App\Http\Controllers\front\HomeControllerFront;
use App\Http\Controllers\front\CheckoutController;
use App\Http\Controllers\front\CategoryControllerFront;
use App\Http\Controllers\front\CartControllerFront;
use App\Http\Controllers\front\SearchController;
use App\Http\Controllers\front\ProductControllerFront;

use App\Http\Controllers\front\VerificationController;
use App\Http\Controllers\Auth\Admin\LoginController;
use App\Http\Controllers\SslCommerzPaymentController;

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
//Front Route
Route::get('/',[HomeControllerFront::class,'home'])->name('home');
Route::get('/page/{id}',[HomeControllerFront::class,'page'])->name('home.page');
Route::get('/page/{id}',[HomeControllerFront::class,'page'])->name('home.page');
Route::get('/category/{id}',[CategoryControllerFront::class,'showProduct'])->name('category.product');
Route::get('/collection/{id}',[HomeControllerFront::class,'collectionProduct'])->name('collection.product');;

//Front cart
Route::resource('/carts', CartControllerFront::class);

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END




//check out controller
Route::get("/checkouts",[CheckoutController::class,'index'])->name('checkouts');
Route::post("checkouts/store",[CheckoutController::class,'store'])->name('checkouts.store');

//Products route for frontend

Route::get('/products','front\ProductController@products')->name('products');
Route::get('/product/{slug}',[ProductControllerFront::class,'show'])->name('product.show');

Route::get('/search',[SearchController::class,'search'])->name('search');


//Route::get('/category/{id}','front\ProductController@category')->name('category.product');
//Product review
Route::post("/review/store",'front\ProductController@reviewstore')->name('review.product.store');
Route::get("/review/delete/{id}/{uid}",'front\ProductController@reviewdelete')->name('review.product.delete');
//Category route for fronted
Route::get('/allcategory','front\CategoryController@mainCategory')->name('maincategory');
Route::get('/subcategory/{pid}','front\CategoryController@subCategory')->name('subcategory');






//Back Route
Route::group(["prefix"=>"admin"],function(){

    Route::get('/', [HomeController::class,'index'])->name('admin.index');;
    Route::get("/login",[LoginController::class,'showLoginForm'])->name('admin.login');
    Route::post("/login/submit",[LoginController::class,'login'])->name('admin.login.submit');
    Route::get("/logout",[LoginController::class,'logout'])->name('admin.logout');
    Route::get('/allcategory', [HomeControllerFront::class,'allcategory'])->name('allcategory');;
    Route::get("/password/reset",'Auth\admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post("/password/email",'Auth\admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');

    Route::get("/password/reset/{token}",'Auth\admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::post("/password/reset",'Auth\admin\ResetPasswordController@reset')->name('admin.password.update');


//Page Route for Admin
Route::resource('/categories', CategoryController::class);
Route::resource('/products', ProductController::class);
Route::resource('/brands', BrandController::class);
Route::resource('/sellers', SellerController::class);
Route::resource('/sliders', SliderController::class);
Route::resource('/banners', BannerController::class);
Route::resource('/places', PlaceController::class);
Route::resource('/collections', CollectionController::class);

Route::get("/orders",[OrderController::class,'orders'])->name('orders');
Route::get("/order/view/{id}",[OrderController::class,'view'])->name('orders.view');
Route::post("/order/delete/{id}",[OrderController::class,'delete'])->name('admin.order.delete');
Route::post("/order/paid/{id}",[OrderController::class,'paid'])->name('admin.order.paid');
Route::post("/order/completed/{id}",[OrderController::class,'completed'])->name('admin.order.completed');
Route::post("/order/charge-update/{id}",[OrderController::class,'chargeUpdate'])->name('admin.order.charge');
Route::get("/order/invoice/{id}",[OrderController::class,'generateInvoice'])->name('admin.order.invoice');




//Brand Route for Admin
Route::get("/brand",'back\BrandController@brands')->name('admin.brands');
Route::get("/brand/edit/{id}",'back\BrandController@edit')->name('admin.brand.edit');
Route::get("/brand/create",'back\BrandController@create')->name('admin.brand.create');
Route::post("/brand/delete/{id}",'back\BrandController@delete')->name('admin.brand.delete');
Route::post("/brand/store",'back\BrandController@store')->name('admin.brand.store');
Route::post("/brand/update/{id}",'back\BrandController@update')->name('admin.brand.update');
Route::get("/brand/manage",'back\BrandController@manage')->name('admin.brand.manage');

//Seller Route for Admin
Route::get("/seller",'back\SellerController@brands')->name('admin.sellers');
Route::get("/seller/edit/{id}",'back\SellerController@edit')->name('admin.seller.edit');
Route::get("/brand/create",'back\SellerController@create')->name('admin.seller.create');
Route::post("/seller/delete/{id}",'back\SellerController@delete')->name('admin.seller.delete');
Route::post("/seller/store",'back\SellerController@store')->name('admin.seller.store');
Route::post("/seller/update/{id}",'back\SellerController@update')->name('admin.seller.update');
Route::get("/seller/manage",'back\SellerController@manage')->name('admin.seller.manage');











//Divisions Route for Admin
Route::get("/divisions",'AdminDivisionsController@brands')->name('admin.divisions');
Route::get("/divisions/edit/{id}",'AdminDivisionsController@edit')->name('admin.divisions.edit');
Route::get("/divisions/create",'AdminDivisionsController@create')->name('admin.divisions.create');
Route::post("/divisions/delete/{id}",'AdminDivisionsController@delete')->name('admin.divisions.delete');
Route::post("/divisions/store",'AdminDivisionsController@store')->name('admin.divisions.store');
Route::post("/divisions/update/{id}",'AdminDivisionsController@update')->name('admin.divisions.update');

//Districts Route for Admin
Route::get("/districts",'AdminDistrictsController@brands')->name('admin.districts');
Route::get("/districts/edit/{id}",'AdminDistrictsController@edit')->name('admin.districts.edit');
Route::get("/districts/create",'AdminDistrictsController@create')->name('admin.districts.create');
Route::post("/districts/delete/{id}",'AdminDistrictsController@delete')->name('admin.districts.delete');
Route::post("/districts/store",'AdminDistrictsController@store')->name('admin.districts.store');
Route::post("/districts/update/{id}",'AdminDistrictsController@update')->name('admin.districts.update');

});

//user  
Route::get("/token/{token}",[VerificationController::class,'verify'])->name('user.verification');
Route::get("/user/dashboard",'UserController@dashboard')->name('user.dashboard');
Route::get("/user/profile",'UserController@profile')->name('user.profile');
Route::post("/user/profile/update",'UserController@update')->name('user.profile.update');




//Auth Routes for user
Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

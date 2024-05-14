<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clients\HomeController;
use App\Http\Controllers\Clients\AccountController;
use App\Http\Controllers\Clients\ProductByCategoryController;
use App\Http\Controllers\Clients\CartController;
use App\Http\Controllers\Clients\ProductDetailController;
use App\Http\Controllers\Clients\CheckoutController;
use App\Http\Controllers\Clients\ProfileController;
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

    Route::get('/',[HomeController::class,'index'])->name('Home');
    Route::get('/test',[HomeController::class,'test']);
    Route::post('/test',[HomeController::class,'testauth']);
    // like product
    Route::get('like/{id}',[HomeController::class,'like_product']);
    // search_product
    Route::get('/search_pr',[HomeController::class,'search_product']);
    Route::get('/search_pr1',[HomeController::class,'Auth_search_product'])->name('search');
    // Account
Route::prefix('Account')->group(function () {
    // register and check register
    Route::get('/Register',[AccountController::class,'Register'])->name('Account.Register'); 
    Route::get('/verify/{email}',[AccountController::class,'verify'])->name('Account.verify');
    Route::post('/Register',[AccountController::class,'Auth_Register'])->name('Account.Auth_Register'); 
    // login and check login
    Route::get('/Login',[AccountController::class,'Login'])->name('Account.Login'); 
    Route::post('/Login',[AccountController::class,'Auth_Login'])->name('Account.Auth_Login'); 
    // Logout
    Route::get('/Logout',[AccountController::class,'Logout'])->name('Account.Logout'); 
    // forgot password
    Route::get('/viewreset',[AccountController::class,'viewresetpass'])->name('Account.viewreset');
    // Send email
    Route::post('/viewreset',[AccountController::class,'Auth_viewresetpass'])->name('Account.Auth_viewreset');
    // show form reset 
    Route::get('showformreset/{token}',[AccountController::class,'showformreset'])->name('Account.showformreset');
    // Update Password
    Route::post('showformreset/{token}',[AccountController::class,'Auth_updatepassword'])->name('Account.Auth_updatepassword');
    // profile
    Route::get('/Profile',[ProfileController::class,'Profile'])->name('Account.Profile'); 
});
    //  Product By category
    Route::get('/{id}-{slug}',[ProductByCategoryController::class,'ProductByCategory'])->name('ProductByCategory');
    Route::get('/filter_productbycategory',[ProductByCategoryController::class,'filter_productbycategory']); 
    // product detail 
Route::prefix('chi-tiet')->group(function(){
    Route::get('/{id}-{slugdetail}',[ProductDetailController::class,'productdetail'])->name('view'); 
});
    // carts
Route::prefix('Cart')->group(function(){
       Route::get('/',[CartController::class,'viewcart'])->name('Cart.view'); 
       Route::post('/addcart/{product}',[CartController::class,'addtoCart'])->name('Cart.addpost');
       Route::get('/addcart/{product}',[CartController::class,'addtoCart'])->name('Cart.addget');
       Route::get('/remove/{id}',[CartController::class,'removeone']);
       Route::get('/removeall',[CartController::class,'removeall']);
        // Remove one item in session
        // change quantity item in session
        Route::get('/changequantityhight',[CartController::class,'quantityhight']);
        Route::get('/changequantitylow',[CartController::class,'quantitylow']);
        Route::get('/changequantitywrite',[CartController::class,'quantitywrite']);

});
        Route::get('/checkout',[CheckoutController::class,'checkout'])->name('Cart.checkout');
        Route::get('/bill',[CheckoutController::class,'viewbill'])->name('Cart.viewbill');
        Route::get('/getdistrict',[CheckoutController::class,'getdistrict']);

   



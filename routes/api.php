<?php

use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\controllers\Api\SubCategoryController;
use App\Http\Controllers\Api\AttributeController;
use App\Http\Controllers\Api\Auth\LoginOtpController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\SubAttributeController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\FeedbackController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ShippingBillingController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::post('register', [RegisterController::class, 'register']);
// Route::post('login', [LoginController::class, 'login']);

Route::controller(LoginOtpController::class)->group(function () {
    Route::post('/verify-otp', 'verifyOtp');
    Route::post('/otp', 'otp');
});

Route::group(['middleware' => ['jwt.verify']], function () {

    Route::controller(BrandController::class)->group(function () {
        Route::get('brand', 'index');
        Route::get('brand/{id}', 'show');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('category', 'index');
        Route::get('category/{id}', 'show');
    });

    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('sub-category', 'index');
        Route::get('sub-category/{id}', 'show');
    });

    Route::controller(AttributeController::class)->group(function () {
        Route::get('attribute', 'index');
        Route::get('attribute/{id}', 'show');
    });

    Route::controller(SubAttributeController::class)->group(function () {
        Route::get('sub-attribute', 'index');
        Route::get('sub-attribute/{id}', 'show');
    });

    Route::controller(ClientController::class)->group(function () {
        Route::get('client', 'index');
        Route::get('client/{id}', 'show');
    });

    Route::controller(ProductController::class)->group(function () {
        Route::get('product', 'index');
        Route::get('product/{id}', 'show');
    });

    Route::resource('cart',CartController::class);

    Route::controller(UserController::class)->group(function () {
        Route::put('user/{id}', 'update');
        Route::get('user/{id}', 'show');
    });

    // Route::controller(OrderController::class)->group(function () {
    //     Route::post('order', 'store');
    //     Route::get('order', 'index');
    //     Route::get('order/{id}', 'show');
    // });
    Route::resource('order',OrderController::class);


    Route::controller(ShippingBillingController::class)->group(function () {
        Route::post('shipping', 'store');
        Route::get('shipping', 'index');
        Route::get('shipping/{id}', 'show');
    });


    Route::controller(FeedbackController::class)->group(function () {
        Route::post('feedback', 'store');
        Route::get('feedback', 'index');
        Route::get('feedback/{id}', 'show');
    });

    Route::controller(BannerController::class)->group(function () {
     
        Route::get('banner', 'index');
    });  
    
    Route::resource('wishlist',WishlistController::class);

});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

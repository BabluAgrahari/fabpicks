<?php

use App\Http\Controllers\CRM\Auth\LoginController;
use App\Http\Controllers\CRM\Auth\Register;
use App\Http\Controllers\CRM\BrandController;
use App\Http\Controllers\CRM\DashboardController;
use App\Http\Controllers\CRM\CategoryController;
use App\Http\Controllers\CRM\SubCategoryController;
use App\Http\Controllers\CRM\AttributeController;
use App\Http\Controllers\CRM\SubAttributeController;
use App\Http\Controllers\CRM\BrandStoreController;
use App\Http\Controllers\CRM\SurvayController;
use App\Http\Controllers\crm\PushController;
use App\Http\Controllers\crm\SettingController;
use App\Http\Controllers\crm\OrderController;
use App\Http\Controllers\crm\ChildCategoryController;
use App\Http\Controllers\crm\ProductAddController;
use App\Http\Controllers\crm\ProductController;
use App\Http\Controllers\crm\ProductListingController;
use App\Http\Controllers\crm\SurvayFeedbackController;
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


Route::group(['prefix' => 'crm', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'dasindex']);
    Route::get('logout', [LoginController::class, 'logout']);

    Route::resource('brand',BrandController::class);

    Route::resource('category',CategoryController::class);

    Route::resource('sub-category',SubCategoryController::class);

    Route::resource('child-category',ChildCategoryController::class);

    Route::resource('attribute',AttributeController::class);

    Route::resource('sub-attribute',SubAttributeController::class);

    Route::resource('brand-store',BrandStoreController::class);

    Route::resource('product',ProductController::class);

    Route::resource('survay',SurvayController::class);
    Route::controller(SurvayController::class)->group(function(){
        Route::get('survay-question/{id}','survayQuestionView');
        Route::post('survay-question','survayQuestion');
    });
    // Route::post('survay-question',[SurvayController::class,'survayQuestion']);

    Route::resource('push-notification',PushController::class);
    Route::resource('product-add',ProductAddController::class);

    Route::get('general',[SettingController::class,'generalIndex']);
    Route::post('generalupdate/{id}',[SettingController::class,'generalupdate']);
    Route::get('aboutus',[SettingController::class,'aboutusIndex']);
    Route::post('aboutus/{id}',[SettingController::class,'aboutupdate']);
    Route::get('privacy',[SettingController::class,'privacyIndex']);
    Route::post('privacy/{id}',[SettingController::class,'privacyupdate']);
    Route::get('conditions',[SettingController::class,'conditionsIndex']);
    Route::post('conditions/{id}',[SettingController::class,'conditionsupdate']);
    Route::get('refund',[SettingController::class,'refundIndex']);
    Route::post('refund/{id}',[SettingController::class,'refundupdate']);

    Route::get('order',[OrderController::class,'indexOrder']);

    Route::get('product-listing',[ProductListingController::class,'productListing']);

    Route::get('sfeedback',[SurvayFeedbackController::class,'sfeedback']);
    
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [LoginController::class, 'index']);
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [Register::class, 'index']);
    Route::post('register', [Register::class, 'register']);
    
});




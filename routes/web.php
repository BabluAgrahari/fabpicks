<?php

use App\Http\Controllers\CRM\Auth\LoginController;
use App\Http\Controllers\CRM\Auth\Register;
use App\Http\Controllers\CRM\BrandController;
use App\Http\Controllers\CRM\DashboardController;
use App\Http\Controllers\CRM\CategoryController;
use App\Http\Controllers\CRM\SubCategoryController;
use App\Http\Controllers\CRM\AttributeController;
use App\Http\Controllers\CRM\BannerController;
use App\Http\Controllers\CRM\SubAttributeController;
use App\Http\Controllers\CRM\SurvayController;
use App\Http\Controllers\CRM\PushController;
use App\Http\Controllers\CRM\SettingController;
use App\Http\Controllers\CRM\OrderController;
use App\Http\Controllers\CRM\ClientController;
use App\Http\Controllers\CRM\UserController;
use App\Http\Controllers\CRM\CouponController;
use App\Http\Controllers\CRM\ProductAddController;
use App\Http\Controllers\CRM\ProductController;
use App\Http\Controllers\CRM\ProductListingController;
use App\Http\Controllers\CRM\FeedbackController;
use App\Http\Controllers\CRM\ShippingCostController;
use App\Http\Controllers\CRM\TaxController;
use App\Models\Banner;
use App\Models\Setting;
use Illuminate\Support\Facades\Artisan;
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

    Route::get('dashboard', [DashboardController::class, 'index']);
    Route::get('logout', [LoginController::class, 'logout']);

    Route::resource('brand', BrandController::class);

    Route::resource('category', CategoryController::class)->middleware('can:isAdmin');

    Route::resource('sub-category', SubCategoryController::class)->middleware('can:isAdmin');

    Route::resource('attribute', AttributeController::class)->middleware('can:isAdmin');

    Route::resource('sub-attribute', SubAttributeController::class)->middleware('can:isAdmin');

    Route::resource('client', ClientController::class)->middleware('can:isAdmin');

    Route::resource('coupon', CouponController::class)->middleware('can:isAdmin');

    Route::resource('tax', TaxController::class)->middleware('can:isAdmin');

    Route::get('product-view/{id}', [ProductController::class, 'viewProduct']);
    Route::post('product-update/{id}', [ProductController::class, 'sortupdate']);

    Route::resource('product', ProductController::class)->middleware('can:isAdmin');
    Route::controller(ProductController::class)->group(function () {
        Route::get('sub-attributes/{id}', 'subAttribute')->middleware('can:isAdmin');
    });
    Route::get('sub-category-export',  [SubCategoryController::class, 'export']);
    Route::get('sub-attribute-export',  [SubAttributeController::class, 'export']);
    Route::get('attribute-export',  [AttributeController::class, 'export']);
    Route::get('category-export',  [CategoryController::class, 'export']);
    Route::get('brand-export',  [BrandController::class, 'export']);
    Route::post('brand-status',  [BrandController::class, 'status']);

    // Route::get('show/{id}', [ProductController::class, 'show']);

    // Route::post('product',[ProductController::class,'addProduct']);

    Route::resource('survay', SurvayController::class);
    Route::controller(SurvayController::class)->group(function () {
        Route::get('survay-question/{id}', 'survayQuestionView');
        Route::post('survay-question', 'survayQuestion')->middleware('can:isAdmin');
        Route::get('edit-question/{id}', 'editQuestion')->middleware('can:isAdmin');
    });
    // Route::post('survay-question',[SurvayController::class,'survayQuestion']);

    Route::resource('push-notification', PushController::class)->middleware('can:isAdmin');

    Route::resource('product-add', ProductAddController::class)->middleware('can:isAdmin');

    Route::get('general',             [SettingController::class, 'generalIndex'])->middleware('can:isAdmin');
    Route::post('generalupdate/{id}', [SettingController::class, 'generalupdate'])->middleware('can:isAdmin');
    Route::get('aboutus',             [SettingController::class, 'aboutusIndex'])->middleware('can:isAdmin');
    Route::post('aboutus/{id}',       [SettingController::class, 'aboutupdate'])->middleware('can:isAdmin');
    Route::get('privacy',             [SettingController::class, 'privacyIndex'])->middleware('can:isAdmin');
    Route::post('privacy/{id}',       [SettingController::class, 'privacyupdate'])->middleware('can:isAdmin');
    Route::get('conditions',          [SettingController::class, 'conditionsIndex'])->middleware('can:isAdmin');
    Route::post('conditions/{id}',    [SettingController::class, 'conditionsupdate'])->middleware('can:isAdmin');
    Route::get('refund',              [SettingController::class, 'refundIndex'])->middleware('can:isAdmin');
    Route::post('refund/{id}',        [SettingController::class, 'refundupdate'])->middleware('can:isAdmin');

    Route::get('order', [OrderController::class, 'index']);
    Route::get('order-details/{id}', [OrderController::class, 'details']);


    Route::get('product-listing', [ProductListingController::class, 'productListing'])->middleware('can:isAdmin');

    Route::get('feedback', [FeedbackController::class, 'index'])->middleware('can:isAdmin');

    Route::get('user',     [UserController::class, 'index'])->middleware('can:isAdmin');
    Route::get('profile',  [UserController::class, 'profile']);
    Route::post('profile', [UserController::class, 'update']);

    Route::resource('banner', BannerController::class)->middleware('can:isAdmin');

    Route::resource('shipping-cost', ShippingCostController::class)->middleware('can:isAdmin');
    Route::get('shipping-cost-list', [ShippingCostController::class, 'getList'])->middleware('can:isAdmin');
});

Route::group(['middleware' => 'guest'], function () {

    Route::get('/',         [LoginController::class, 'index']);
    Route::post('login',    [LoginController::class, 'login']);

    Route::get('register',  [Register::class, 'index']);
    Route::post('register', [Register::class, 'register']);
});

Route::get('optimize', function () {
    Artisan::call('optimize');
});

Route::get('banner-table', function () {

    for ($i = 1; $i <= 5; $i++) {
        $banner = new Banner();
        $banner->save();
    }
    echo "Banner collection created Successfully.";
})->middleware('throttle:1,60');

Route::get('setting', function () {
    $setting = new Setting();
    $setting->save();

    echo "Setting Collection Created Successfully.";
})->middleware('throttle:1,60');

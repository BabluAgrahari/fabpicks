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
    Route::resource('brand',BrandController::class);
    Route::resource('category',CategoryController::class);
    Route::resource('sub-category',SubCategoryController::class);
    Route::resource('attribute',AttributeController::class);
    Route::resource('sub-attribute',SubAttributeController::class);
    Route::resource('brand-store',BrandStoreController::class);
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [LoginController::class, 'index']);
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [Register::class, 'index']);
    Route::post('register', [Register::class, 'register']);
});




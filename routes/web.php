<?php

use App\Http\Controllers\CRM\Auth\Login;
use App\Http\Controllers\CRM\Auth\Register;
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

Route::get('/', [Login::class, 'index']);
Route::post('login', [Login::class, 'login']);
Route::get('register', [Register::class, 'index']);
Route::post('register', [Register::class, 'register']);

// Route::get('/', function () {
//     return view('admin.dashboard');
// });

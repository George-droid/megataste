<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\LandingPageController;

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
// });

Route::get('/login', [CustomAuthController::class, 'login'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->name('be.dashboard');
Route::get('/dashboard/menus', [CustomAuthController::class, 'menus'])->name('be.menus');
Route::get('/dashboard/dishes', [CustomAuthController::class, 'dishes'])->name('be.dishes');
Route::get('/dashboard/orders', [CustomAuthController::class, 'orders'])->name('be.orders');


Route::get('/', [LandingPageController::class, 'landingpage'])->name('fe.landingpage');
Route::get('/about', [LandingPageController::class, 'about'])->name('fe.about');
Route::get('/menu', [MenuController::class, 'menu'])->name('fe.menu');

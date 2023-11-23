<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('be.dashboard');
Route::get('/dashboard/addmenus', [DashboardController::class, 'addMenus'])->name('be.addmenus');
Route::post('/dashboard/savemenus', [DashboardController::class, 'saveMenus'])->name('be.savemenus');
Route::get('/dashboard/listmenus', [DashboardController::class, 'listMenus'])->name('be.listmenus');
Route::post('/dashboard/deletemenus', [DashboardController::class, 'deleteMenus'])->name('be.deletemenus');
Route::get('/dashboard/dishes', [DashboardController::class, 'dishes'])->name('be.dishes');
Route::get('/dashboard/orders', [DashboardController::class, 'orders'])->name('be.orders');


Route::get('/', [LandingPageController::class, 'landingpage'])->name('fe.landingpage');
Route::get('/about', [LandingPageController::class, 'about'])->name('fe.about');
Route::get('/menu', [MenuController::class, 'menu'])->name('fe.menu');
Route::get('/contact', [ContactController::class, 'contact'])->name('fe.contact');
Route::post('/contact/submit', [ContactController::class, 'submitContactForm'])->name('fe.submitContactForm');

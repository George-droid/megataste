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

Route::middleware('auth.dashboard')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('be.dashboard');
    Route::get('/dashboard/add-menus', [DashboardController::class, 'addMenus'])->name('be.addmenus');
    Route::post('/dashboard/save-menus', [DashboardController::class, 'saveMenus'])->name('be.savemenus');
    Route::get('/dashboard/list-menus', [DashboardController::class, 'listMenus'])->name('be.listmenus');
    Route::delete('/dashboard/list-menus/delete/{id}', [DashboardController::class, 'deleteMenus'])->name('be.deletemenus');
    Route::get('/dashboard/add-dishes', [DashboardController::class, 'addDishes'])->name('be.adddishes');
    Route::post('/dashboard/save-dishes', [DashboardController::class, 'saveDishes'])->name('be.savedishes');
    Route::get('/dashboard/list-dishes', [DashboardController::class, 'listDishes'])->name('be.listdishes');
    Route::delete('/dashboard/list-dishes/delete/{id}', [DashboardController::class, 'deleteDish'])->name('be.deletedishes');
});

Route::get('/login', [CustomAuthController::class, 'login'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('/logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('/dashboard/orders', [DashboardController::class, 'orders'])->name('be.orders');

Route::get('/', [LandingPageController::class, 'landingpage'])->name('fe.landingpage');
Route::get('/about', [LandingPageController::class, 'about'])->name('fe.about');
Route::get('/menu', [MenuController::class, 'menu'])->name('fe.menu');
Route::get('/contact', [ContactController::class, 'contact'])->name('fe.contact');
Route::post('/contact/submit', [ContactController::class, 'submitContactForm'])->name('fe.submitContactForm');

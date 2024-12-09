<?php

use App\Http\Controllers\CartItemController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TransactionController;
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

Route::get('/', [HomeController::class, 'index']);
Route::post('/', [CheckoutController::class, 'checkout'])->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/search', [SearchController::class, 'index'])->middleware('auth');

Route::get('/checkout', [CheckoutController::class, 'index'])->middleware('auth');

Route::get('/add', [ItemController::class, 'add_index'])->middleware('auth')->middleware('admin');
Route::post('/add', [ItemController::class, 'add'])->middleware('auth')->middleware('admin');

Route::get('/item/{id}', [ItemController::class, 'detail']);
Route::post('/item/{id}', [ItemController::class, 'order']);

Route::get('/manage', [ItemController::class, 'manage_index'])->middleware('auth')->middleware('admin');
Route::post('/manage', [ItemController::class, 'delete'])->middleware('auth')->middleware('admin');

Route::get('/update/{id}', [ItemController::class, 'update_index'])->middleware('auth')->middleware('admin');
Route::patch('/update/{id}', [ItemController::class, 'update'])->middleware('auth')->middleware('admin');

Route::get('/cart', [CartItemController::class, 'display'])->middleware('auth');
Route::post('/cart', [CartItemController::class, 'process'])->middleware('auth');

Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

Route::get('/settings', [ProfileController::class, 'settings'])->middleware('auth');
Route::patch('/settings', [ProfileController::class, 'save'])->middleware('auth');

Route::get('/history', [TransactionController::class, 'index'])->middleware('auth');
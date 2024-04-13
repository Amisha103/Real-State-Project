<?php

use App\Http\Controllers\AdminPanelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\AllDataController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\getAvailableController;
use App\Http\Controllers\FlatForSaleController;
use App\Http\Controllers\LandForSaleController;
use App\Http\Controllers\mainController;

Route::view('/hire', 'pages.hire')->name('hire');
Route::view('/', 'pages.home');

Route::get('/buy', [BuyController::class, 'index'])->name('buy');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');

Route::get('/get-option', [OptionController::class, 'getOption'])->name('getOption');

Route::get('/buy-options/all', [AllDataController::class, 'getAllData'])->name('getAllData');
Route::get('/available-data', [getAvailableController::class, 'getAvailableData'])->name('getAvailableData');
Route::get('/flat-for-sale', [FlatForSaleController::class, 'FlatSaleData'])->name('FlatSaleData');
Route::get('/land-for-sale', [LandForSaleController::class, 'LandSale'])->name('LandSale');
Route::get('/register-user', [mainController::class, 'register'])->name('register');
Route::get('/login-user', [mainController::class, 'login'])->name('login');
Route::get('/logout', [mainController::class, 'logout'])->name('logout');
Route::get('/post', [mainController::class, 'post'])->name('post');
Route::get('/cart', [mainController::class, 'cart'])->name('cart');
Route::get('/deleteCartItem/{id}', [mainController::class, 'deleteCartItem'])->name('deleteCartItem');
Route::post('/registerUser', [mainController::class, 'registerUser'])->name('registerUser');
Route::post('/PostBlog', [PostController::class, 'PostBlog'])->name('PostBlog');
Route::post('/loginUser', [mainController::class, 'loginUser'])->name('loginUser');
Route::post('/addToCart', [mainController::class, 'addToCart'])->name('addToCart');

// ---------------------------admin------------------------------

Route::get('/admin-login', [AdminPanelController::class, 'index'])->name('index');
Route::get('/update-blog', [AdminPanelController::class, 'UpdateBlog'])->name('UpdateBlog');
Route::get('/admin-register', [AdminPanelController::class, 'adminRegister'])->name('adminRegister');
Route::post('/adminRegisterUser', [AdminPanelController::class, 'adminRegisterUser'])->name('adminRegisterUser');
Route::post('/AdminLoginUser', [AdminPanelController::class, 'AdminLoginUser'])->name('AdminLoginUser');

Route::get('/blogs', [BlogController::class, 'indexUpdate'])->name('blogs.indexUpdate');
Route::get('/blogs/{id}', [BlogController::class, 'delete'])->name('blogs.delete');

Route::get('/contacts', [ContactController::class, 'index'])->name('index');
Route::get('/contacts-delete/{id}', [ContactController::class, 'delete'])->name('delete');
Route::post('/addinfo', [ContactController::class, 'addinfo'])->name('addinfo');

Route::get('/all-property-admin', [AllDataController::class, 'index'])->name('index');
Route::get('/delete/{id}', [AllDataController::class, 'delete'])->name('delete');

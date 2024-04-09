<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SeeController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\AllDataController;
use App\Http\Controllers\getAvailableController;
use App\Http\Controllers\FlatForSaleController;
use App\Http\Controllers\LandForSaleController;
use App\Http\Controllers\mainController;

Route::view('/hire', 'pages.hire')->name('hire');
Route::view('/', 'pages.home');


Route::get('/see', [SeeController::class, 'index'])->name('see');
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
Route::post('/registerUser', [mainController::class, 'registerUser'])->name('registerUser');
Route::post('/loginUser', [mainController::class, 'loginUser'])->name('loginUser');

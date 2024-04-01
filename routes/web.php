<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\SeeController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\OptionController;


Route::view('/hire', 'pages.hire')->name('hire');
Route::view('/', 'pages.home');


Route::get('/see', [SeeController::class, 'index'])->name('see');
Route::get('/buy', [BuyController::class, 'index'])->name('buy');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');

Route::get('/get-option', [OptionController::class, 'getOption'])->name('getOption');

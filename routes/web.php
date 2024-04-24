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
Route::view('/', 'pages.home')->name('home');

Route::get('/buy', [BuyController::class, 'index'])->name('buy');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/your-blog/{id}', [BlogController::class, 'YourBlog'])->name('Yourblog');
Route::get('/blogs', [BlogController::class, 'indexUpdate'])->name('blogs.indexUpdate');
Route::get('/blogs/{id}', [BlogController::class, 'delete'])->name('blogs.delete');

Route::get('/get-option', [OptionController::class, 'getOption'])->name('getOption');

Route::get('/buy-options/all', [AllDataController::class, 'getAllData'])->name('getAllData');
Route::get('/available-data', [getAvailableController::class, 'getAvailableData'])->name('getAvailableData');
Route::get('/flat-for-sale', [FlatForSaleController::class, 'FlatSaleData'])->name('FlatSaleData');
Route::get('/land-for-sale', [LandForSaleController::class, 'LandSale'])->name('LandSale');

Route::get('/clear-cart', [mainController::class, 'clearCart'])->name('clear.cart');
Route::post('/update-quantity', [mainController::class, 'updateQuantity'])->name('updateQuantity');
Route::get('/purchase/{id}', [mainController::class, 'PurchaseButton'])->name('PurchaseButton');
Route::get('/purchase-show/{id}', [mainController::class, 'PurchaseShow'])->name('PurchaseShow');
Route::get('/register-user', [mainController::class, 'register'])->name('register');
Route::get('/login-user', [mainController::class, 'login'])->name('login');
Route::get('/logout', [mainController::class, 'logout'])->name('logout');
Route::get('/post', [mainController::class, 'post'])->name('post');
Route::get('/cart', [mainController::class, 'cart'])->name('cart');
Route::get('/deleteCartItem/{id}', [mainController::class, 'deleteCartItem'])->name('deleteCartItem');
Route::post('/registerUser', [mainController::class, 'registerUser'])->name('registerUser');
Route::post('/loginUser', [mainController::class, 'loginUser'])->name('loginUser');
Route::post('/addToCart', [mainController::class, 'addToCart'])->name('addToCart');

Route::post('/PostBlog', [PostController::class, 'PostBlog'])->name('PostBlog');

// ---------------------------admin------------------------------

Route::get('/admin-login', [AdminPanelController::class, 'index'])->name('index');
Route::get('/admin-home', [AdminPanelController::class, 'adminHome'])->name('adminHome');
Route::get('/update-blog', [AdminPanelController::class, 'UpdateBlog'])->name('UpdateBlog');
Route::get('/admin-register', [AdminPanelController::class, 'adminRegister'])->name('adminRegister');
Route::post('/adminRegisterUser', [AdminPanelController::class, 'adminRegisterUser'])->name('adminRegisterUser');
// Route::post('/AdminLoginUser', [AdminPanelController::class, 'AdminLoginUser'])->name('AdminLoginUser');

Route::get('/contacts', [ContactController::class, 'index'])->name('index');
Route::get('/contacts-delete/{id}', [ContactController::class, 'delete'])->name('delete');
Route::post('/addinfo', [ContactController::class, 'addinfo'])->name('addinfo');

Route::get('/all-property-admin', [AllDataController::class, 'index'])->name('index');
Route::get('/deleteAll/{id}', [AllDataController::class, 'delete'])->name('delete');
Route::get('/add-data', [AllDataController::class, 'addData'])->name('addData');
Route::post('/addAllSales', [AllDataController::class, 'addAllSales'])->name('addAllSales');
Route::get('/editAll/{id}', [AllDataController::class, 'edit'])->name('edit');
Route::put('/updateAll/{id}', [AllDataController::class, 'updateAll'])->name('updateAll');

Route::get('/available-sale-admin', [getAvailableController::class, 'index'])->name('index');
Route::get('/deleteAv/{id}', [getAvailableController::class, 'delete'])->name('delete');
Route::get('/add-av-data-page', [getAvailableController::class, 'addDataPage'])->name('addDataPage');
Route::post('/add-av-data', [getAvailableController::class, 'add_available_data'])->name('add_available_data');
Route::get('/editAv/{id}', [getAvailableController::class, 'edit'])->name('edit');
Route::put('/updateAv/{id}', [getAvailableController::class, 'updateAv'])->name('updateAv');

Route::get('/flat-sale-admin', [FlatForSaleController::class, 'index'])->name('index');
Route::get('/deleteFlat/{id}', [FlatForSaleController::class, 'delete'])->name('delete');
Route::get('/add-flat-page', [FlatForSaleController::class, 'addFlatPage'])->name('addFlatPage');
Route::post('/add-flat-data', [FlatForSaleController::class, 'addFlatData'])->name('addFlatData');
Route::get('/editFlat/{id}', [FlatForSaleController::class, 'edit'])->name('edit');
Route::put('/update/{id}', [FlatForSaleController::class, 'update'])->name('update');

Route::get('/land-sale-admin', [LandForSaleController::class, 'index'])->name('index');
Route::get('/deleteLand/{id}', [LandForSaleController::class, 'delete'])->name('delete');
Route::get('/add-land-page', [LandForSaleController::class, 'addLandPage'])->name('addLandPage');
Route::post('/add-land-data', [LandForSaleController::class, 'addLandData'])->name('addLandData');
Route::get('/editLand/{id}', [LandForSaleController::class, 'edit'])->name('edit');
Route::put('/updateLand/{id}', [LandForSaleController::class, 'updateLand'])->name('updateLand');

Route::get('/purchase-details-admin', [AdminPanelController::class, 'purchaseDetailsAdmin'])->name('purchaseDetailsAdmin');
Route::get('/deleted-purchase-from-admin/{id}', [AdminPanelController::class, 'deletedPurchaseAdmin'])->name('deletedPurchaseAdmin');

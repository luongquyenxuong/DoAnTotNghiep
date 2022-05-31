<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\ToppingController;
use App\Http\Controllers\UserController;

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



Route::middleware(['auth'])->group(function(){
    Route::get('/', function () {
        return view('index');
    });

    Route::get('product/deleted', [ProductController::class, 'deleted'])->name('product.deleted');
    Route::get('product/restore/{id}', [ProductController::class, 'restore'])->name('product.restore');
    Route::resource('product', ProductController::class);

    Route::get('user/deleted', [UserController::class, 'deleted'])->name('user.deleted');
    Route::get('user/restore/{id}', [UserController::class, 'restore'])->name('user.restore');
    Route::resource('user', UserController::class);


    Route::get('category/deleted', [CategoryController::class, 'deleted'])->name('category.deleted');
    Route::get('category/restore/{id}', [CategoryController::class, 'restore'])->name('category.restore');
    Route::resource('category', CategoryController::class);

    Route::get('size/deleted', [SizeController::class, 'deleted'])->name('size.deleted');
    Route::get('size/restore/{id}', [SizeController::class, 'restore'])->name('size.restore');
    Route::resource('size', SizeController::class);

    Route::get('topping/deleted', [ToppingController::class, 'deleted'])->name('topping.deleted');
    Route::get('topping/restore/{id}', [ToppingController::class, 'restore'])->name('topping.restore');
    Route::resource('topping', ToppingController::class);

    Route::get('address/deleted', [AddressController::class, 'deleted'])->name('address.deleted');
    Route::get('address/restore/{id}', [AddressController::class, 'restore'])->name('address.restore');
    Route::resource('address', AddressController::class);
});
Route::get('login', [LoginController::class, 'showForm'])->name('login');
Route::post('login', [LoginController::class, 'authenticate'])->name('login');
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
//Route::get('/', [HomeController::class, 'index']);

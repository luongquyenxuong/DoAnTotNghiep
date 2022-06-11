<?php

use App\Http\Controllers\ADMIN\AddressController;
use App\Http\Controllers\ADMIN\BillController;
use App\Http\Controllers\ADMIN\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ADMIN\LoginController;
use App\Http\Controllers\ADMIN\ProductController;
use App\Http\Controllers\ADMIN\HomeController;
use App\Http\Controllers\ADMIN\SizeController;
use App\Http\Controllers\ADMIN\ToppingController;
use App\Http\Controllers\ADMIN\UserController;

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



Route::middleware(['auth'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'index']);
    // Route::get('/admin/home', function () {
    //     return view('Admin.index');
    // });
    Route::get('admin/product/deleted', [ProductController::class, 'deleted'])->name('admin.product.deleted');
    Route::get('admin/product/restore/{id}', [ProductController::class, 'restore'])->name('admin.product.restore');
    Route::resource('admin/product', ProductController::class);

    Route::get('admin/user/deleted', [UserController::class, 'deleted'])->name('admin.user.deleted');
    Route::get('admin/user/restore/{id}', [UserController::class, 'restore'])->name('admin.user.restore');
    Route::resource('admin/user', UserController::class);


    Route::get('admin/category/deleted', [CategoryController::class, 'deleted'])->name('admin.category.deleted');
    Route::get('admin/search', [CategoryController::class, 'search']);
    Route::get('admin/category/restore/{id}', [CategoryController::class, 'restore'])->name('admin.category.restore');
    Route::resource('admin/category', CategoryController::class);

    Route::get('admin/size/deleted', [SizeController::class, 'deleted'])->name('admin.size.deleted');
    Route::get('admin/size/restore/{id}', [SizeController::class, 'restore'])->name('admin.size.restore');
    Route::resource('admin/size', SizeController::class);

    Route::get('admin/topping/deleted', [ToppingController::class, 'deleted'])->name('admin.topping.deleted');
    Route::get('admin/topping/restore/{id}', [ToppingController::class, 'restore'])->name('admin.topping.restore');
    Route::resource('admin/topping', ToppingController::class);

    Route::get('admin/address/deleted', [AddressController::class, 'deleted'])->name('admin.address.deleted');
    Route::get('admin/address/restore/{id}', [AddressController::class, 'restore'])->name('admin.address.restore');
    Route::resource('admin/address', AddressController::class);

    Route::get('admin/bill/cancel', [BillController::class, 'cancel'])->name('admin.bill.cancel');
    Route::get('admin/bill/finished/{id}', [BillController::class, 'finished'])->name('admin.bill.finished');
    Route::get('admin/bill/complete', [BillController::class, 'complete'])->name('admin.bill.complete');
    Route::get('admin/bill/delivering', [BillController::class, 'delivering'])->name('admin.bill.delivering');
    Route::get('admin/bill/confirm/{id}', [BillController::class, 'confirm'])->name('admin.bill.confirm');
    Route::get('admin/bill/confirming', [BillController::class, 'confirming'])->name('admin.bill.confirming');
    Route::get('admin/bill/filter/{id}', [BillController::class, 'filter'])->where('id','[0-9]+');
     Route::resource('admin/bill', BillController::class);

});
Route::get('admin/login', [LoginController::class, 'showForm'])->name('login');
Route::post('admin/login', [LoginController::class, 'authenticate'])->name('login');
Route::get('admin/logout', [LoginController::class, 'logout'])->name('logout');
//Route::get('/', [HomeController::class, 'index']);

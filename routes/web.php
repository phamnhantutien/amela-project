<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClothController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;

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

Route::get('/', function () {
    return view('frontend.home');
})->name('home');

Route::get('/login', [CustomerController::class, 'showLogin'])->name('showlogin');
Route::post('/login', [CustomerController::class, 'login'])->name('customer.login');
Route::get('/logout', [CustomerController::class, 'logout'])->name('customer.logout');

Route::prefix('admin')->group(function() {
    Route::get('/', function () {
        return view('admin.home');
    })->name('admin.home');

    Route::get('/login', [AdminController::class, 'showLogin'])->name('admin.showlogin');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

    Route::prefix('cloth')->group(function() {
        Route::get('/', [ClothController::class, 'index'])->name('admin.cloth.index');
        Route::get('/create', [ClothController::class, 'create'])->name('admin.cloth.create');
        Route::post('/create', [ClothController::class, 'store'])->name('admin.cloth.store');
        Route::get('show/{id}', [ClothController::class, 'show'])->name('admin.cloth.show');
        Route::get('edit/{id}', [ClothController::class, 'edit'])->name('admin.cloth.edit');
        Route::post('edit/{id}', [ClothController::class, 'update'])->name('admin.cloth.update');
        Route::get('delete/{id}', [ClothController::class, 'delete'])->name('admin.cloth.delete');
        Route::post('delete/{id}', [ClothController::class, 'destroy'])->name('admin.cloth.destroy');
        Route::get('/filter', [ClothController::class, 'filterByBrand'])->name('admin.cloth.filterByBrand');
        Route::get('/search', [ClothController::class, 'search'])->name('admin.cloth.search');
    });
    
    Route::prefix('brand')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('admin.brand.index');
        Route::get('/create', [BrandController::class, 'create'])->name('admin.brand.create');
        Route::post('/create', [BrandController::class, 'store'])->name('admin.brand.store');
        Route::get('show/{id}', [BrandController::class, 'show'])->name('admin.brand.show');
        Route::get('edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
        Route::post('edit/{id}', [BrandController::class, 'update'])->name('admin.brand.update');
        Route::get('delete/{id}', [BrandController::class, 'delete'])->name('admin.brand.delete');
        Route::post('delete/{id}', [BrandController::class, 'destroy'])->name('admin.brand.destroy');
    });
});
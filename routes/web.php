<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClothController;

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
    return view('home');
})->name('home');

Route::prefix('cloth')->group(function() {
    Route::get('/', [ClothController::class, 'index'])->name('cloth.index');
    Route::get('/create', [ClothController::class, 'create'])->name('cloth.create');
    Route::post('/create', [ClothController::class, 'store'])->name('cloth.store');
    Route::get('show/{id}', [ClothController::class, 'show'])->name('cloth.show');
    Route::get('edit/{id}', [ClothController::class, 'edit'])->name('cloth.edit');
    Route::post('edit/{id}', [ClothController::class, 'update'])->name('cloth.update');
    Route::get('delete/{id}', [ClothController::class, 'delete'])->name('cloth.delete');
    Route::post('delete/{id}', [ClothController::class, 'destroy'])->name('cloth.destroy');
});

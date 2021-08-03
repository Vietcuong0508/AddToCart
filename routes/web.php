<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', [App\Http\Controllers\ProductController::class, 'create']);
Route::post('/create', [App\Http\Controllers\ProductController::class, 'store']);
Route::get('/list', [App\Http\Controllers\ProductController::class, 'index']);
Route::get('/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit']);
Route::post('/edit/{id}', [App\Http\Controllers\ProductController::class, 'update']);

Route::get('/add', [App\Http\Controllers\ShoppingCartController::class, 'add']);
Route::get('/show', [App\Http\Controllers\ShoppingCartController::class, 'show']);
Route::get('/remove/{rowId}', [App\Http\Controllers\ShoppingCartController::class, 'remove']);
Route::get('/update', [App\Http\Controllers\ShoppingCartController::class, 'update']);
Route::get('/destroy', [App\Http\Controllers\ShoppingCartController::class, 'destroy']);
Route::post('/order/save', [App\Http\Controllers\ShoppingCartController::class, 'save'])->name('saveOrder');

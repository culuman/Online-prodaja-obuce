<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\ShoesController::class, 'index'])->name('welcome');
Route::get('/oglas/{id}', [App\Http\Controllers\ShoesController::class, 'oglas'])->name('welcome.oglas');

Auth::routes();

Route::get('/home',[App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/new-shoes',[App\Http\Controllers\HomeController::class, 'newShoes'])->name('home.newShoes');
Route::post('/home/new-shoes',[App\Http\Controllers\HomeController::class, 'storeShoes'])->name('home.storeShoes');
Route::get('/home/oglas/{id}',[App\Http\Controllers\HomeController::class, 'oglas'])->name('home.oglas');
Route::get('/home/oglas/{id}/edit',[App\Http\Controllers\ShoesController::class, 'edit']);
Route::put('/home/oglas/{id}/edit',[App\Http\Controllers\ShoesController::class, 'update']);
Route::delete('/home/oglas/{id}',[App\Http\Controllers\ShoesController::class, 'destroy']);
Route::get('/home/add-deposit', [App\Http\Controllers\HomeController::class, 'addDeposit'])->name('home.addDeposit');
Route::get('subtract-deposit', [App\Http\Controllers\HomeController::class, 'subtractDeposit'])->name('subtractDeposit');
Route::post('/home/add-deposit', [App\Http\Controllers\HomeController::class, 'storeDeposit'])->name('home.storeDeposit');
Route::get('cart', [App\Http\Controllers\ShoesController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [App\Http\Controllers\ShoesController::class, 'addToCart'])->name('add_to_cart');
Route::delete('remove-from-cart', [App\Http\Controllers\ShoesController::class, 'removeFromCart'])->name('remove_from_cart');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UIController;

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

Route::get('/', function () {
    return view('welcome');
});

//AuthRoute

Route::get('/register', [UIController::class, 'regis'])->name('regis');
Route::get('/login', [UIController::class, 'log'])->name('log');
Route::post('/register', [UIController::class, 'register'])->name('register');
Route::post('/login', [UIController::class, 'login'])->name('login');
Route::get('/logout', [UIController::class, 'logout'])->name('logout');

//ProductRoute
Route::get('/product', [UIController::class, 'product'])->name('product');
Route::get('/searchProduct', [UIController::class, 'searchProduct'])->name('searchProduct');
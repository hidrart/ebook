<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\OrderController;

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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', function() {return view('dashboard');})->name('dashboard');
    Route::get('/about', function() {return view('about');})->name('about');
    
    Route::get('/book', [BookController::class, 'index'])->name('book');
    Route::get('/order', [OrderController::class, 'index'])->name('order');

    Route::group(['prefix' => 'book'], function() {
        Route::get('/{book}', [BookController::class, 'show']); 
    });

    Route::group(['prefix' => 'order'], function() {
        Route::get('/{order}', [OrderController::class, 'show']);
    });
});

Route::group(['middleware' => ['auth', 'role:admin']], function(){
    Route::get('/admin', function() {return view('admin');})->name('admin');
});

require __DIR__.'/auth.php';

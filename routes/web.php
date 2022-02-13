<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => ['auth', 'role:admin']], function() {
    Route::group(['prefix' => 'admin'], function() {
        Route::get('/', [UserController::class, 'index'])->name('admin');
        Route::get('/{user}', [UserController::class, 'show']);
    });
    
    Route::group(['prefix' => 'book'], function() {
        Route::get('/create', [BookController::class, 'create']);
        Route::post('/create', [BookController::class, 'store']);
        
        Route::get('/edit/{book:id}', [BookController::class, 'edit']);
        Route::put('/{book:id}', [BookController::class, 'update']);
        
        Route::delete('/delete/{book:id}', [BookController::class, 'destroy']);
    });
    
    Route::group(['prefix' => 'order'], function() {
        Route::get('/edit', [OrderController::class, 'edit']);
        Route::get('/create', [OrderController::class, 'create']);
        Route::post('/create', [OrderController::class, 'store']);
    });
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::get('/about', fn() => view('about'))->name('about');
    
    Route::group(['prefix' => 'book'], function() {
        Route::get('/', [BookController::class, 'index'])->name('book');
        Route::get('/{book:id}', [BookController::class, 'show']);
    });
    
    Route::group(['prefix' => 'order'], function() {
        Route::get('/', [OrderController::class, 'index'])->name('order');
        Route::get('/{order:id}', [OrderController::class, 'show']);
    });
});

require __DIR__.'/auth.php';

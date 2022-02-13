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
        Route::get('/edit/{user:id}', [UserController::class, 'edit']);
        Route::put('/{user:id}', [UserController::class, 'update']);
        Route::delete('/delete/{user:id}', [UserController::class, 'destroy']);
    });
    
    Route::group(['prefix' => 'book'], function() {
        Route::get('/create', [BookController::class, 'create']);
        Route::get('/edit/{book:id}', [BookController::class, 'edit']);
        
        Route::post('/create', [BookController::class, 'store']);        
        Route::put('/{book:id}', [BookController::class, 'update']);
        Route::delete('/delete/{book:id}', [BookController::class, 'destroy']);
    });
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/profile', [UserController::class, 'profile'])->name('profile');
    Route::get('/profile/edit', [UserController::class, 'detail']);
    Route::put('/profile/edit', [UserController::class, 'complete']);
    
    Route::get('/dashboard', fn() => view('dashboard'))->name('dashboard');
    Route::get('/about', fn() => view('about'))->name('about');
    
    Route::group(['prefix' => 'book'], function() {
        Route::get('/', [BookController::class, 'index'])->name('book');
        Route::get('/{book:id}', [BookController::class, 'show']);
    });
    
    Route::group(['prefix' => 'order'], function() {
        Route::get('/', [OrderController::class, 'index'])->name('order');
        Route::get('/create', [OrderController::class, 'create']);
        Route::get('/{order:id}', [OrderController::class, 'show']);
        Route::get('/edit/{order:id}', [OrderController::class, 'edit']);
        
        Route::post('/create', [OrderController::class, 'store']);     
        Route::put('/{order:id}', [OrderController::class, 'update']);
        Route::delete('/delete/{order:id}', [OrderController::class, 'destroy']);
    });
});

require __DIR__.'/auth.php';

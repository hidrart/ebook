<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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
    Route::get('/book/{book}', [BookController::class, 'show']);
});

require __DIR__.'/auth.php';

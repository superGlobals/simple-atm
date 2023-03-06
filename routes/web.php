<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TransactionController;

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

Route::controller(CustomerController::class)->group(function() {

    Route::middleware(['custom_auth'])->group(function() {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });

    Route::get('/', 'index')->name('home');
    Route::get('/login', 'login')->name('login');
    Route::get('/register', 'register')->name('register');
    Route::post('/register', 'registerProcess')->name('registerProcess');
    Route::post('/login', 'loginProcess')->name('loginProcess');
    Route::get('/logout', 'logout')->middleware('custom_auth')->name('logout');
});

Route::controller(TransactionController::class)->middleware('custom_auth')->group(function() {
    
    Route::get('/transactions', 'index')->name('transactions');
    Route::get('/deposit', 'showDeposit')->name('showDeposit');
    Route::post('/deposit', 'deposit')->name('deposit');

    Route::get('/withdraw', 'showWithdraw')->name('showWithdraw');
    Route::post('/withdraw', 'withdraw')->name('withdraw');

    Route::get('/transfer', 'showTransfer')->name('showTransfer');
    Route::post('/transfer', 'transfer')->name('transfer');
});


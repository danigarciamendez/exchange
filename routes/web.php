<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CryptocurrencyController;
use App\Http\Controllers\WalletController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

    // ROUTES OF CRYPTOCURRENCY
    
Route::get('/cryptocurrency', [CryptocurrencyController::class, 'index'])
    ->name('cryptocurrency.index');

Route::get('/cryptocurrency/new', [CryptocurrencyController::class, 'create'])
    ->name('cryptocurrency.create');


    // ROUTES OF WALLET

Route::get('/wallet', [WalletController::class, 'index'])
    ->name('wallet.index');

Route::get('/wallet/new', [WalletController::class, 'create'])
    ->name('wallet.create');



require __DIR__.'/auth.php';

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CryptocurrencyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminCryptocurrencyController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\FollowController;


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

    // ROUTES OF USER
    
Route::get('/profile', [UserController::class, 'show'])
    ->middleware(['auth'])->name('user.show');
    
    
    // ROUTES OF CRYPTOCURRENCY
    
Route::get('/cryptocurrency', [CryptocurrencyController::class, 'index'])
->middleware(['auth'])->name('cryptocurrency.index');



    // ROUTES OF  ADMIN CRYPTOCURRENCY
    
Route::get('/cryptocurrency/admin', [AdminCryptocurrencyController::class, 'index'])
->middleware(['auth'])->name('cryptocurrency.admin.index');

Route::get('/cryptocurrency/{id}/show', [CryptocurrencyController::class, 'show'])
->middleware(['auth'])->name('cryptocurrency.show');

Route::get('/cryptocurrency/admin/create', [CryptocurrencyController::class, 'create'])
->middleware(['auth'])->name('cryptocurrency.admin.create');

    
Route::get('/cryptocurrency/admin/{crypto}/edit', [CryptocurrencyController::class, 'edit'])
->middleware(['auth'])->name('cryptocurrency.admin.edit');

Route::put('/cryptocurrency/admin/{crypto}', [CryptocurrencyController::class, 'update'])
->middleware(['auth'])->name('cryptocurrency.update');

Route::get('/cryptocurrency/admin/destroy', [CryptocurrencyController::class, 'destroy'])
->middleware(['auth'])->name('cryptocurrency.admin.destroy');

    // ROUTES OF EXCHANGE

Route::get('/exchange', [ExchangeController::class, 'index'])
->middleware(['auth'])->name('exchange.index');

Route::get('/exchange/{exchange}/show', [ExchangeController::class, 'show'])
->middleware(['auth'])->name('exchange.show');


    //ROUTES OF  ADMIN EXCHANGE
    
Route::get('/exchange/admin', [ExchangeController::class, 'index'])
->middleware(['auth'])->name('exchange.admin.index');
    
Route::get('/exchange/admin/create', [ExchangeController::class, 'create'])
->middleware(['auth'])->name('exchange.admin.create');

Route::get('/exchange/admin/delete', [ExchangeController::class, 'destroy'])
->middleware(['auth'])->name('exchange.admin.destroy');

   // ROUTES OF FOLLOW

Route::post('/cryptocurrency/follow', [FollowController::class, 'new_follow'])
   ->middleware(['auth'])->name('follow.new_follow');


require __DIR__.'/auth.php';

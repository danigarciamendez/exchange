<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CryptocurrencyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminCryptocurrencyController;
use App\Http\Controllers\ExchangeController;
use App\Http\Controllers\AdminExchangeController;
use App\Http\Controllers\FollowController;
use App\Models\Cryptocurrency;
use App\Models\Follow;
use Illuminate\Support\Facades\Auth;

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
    
    $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
        $parameters = [
        'start' => '1',
        'limit' => '20'
        ];

        $headers = [
        'Accepts: application/json',
        'X-CMC_PRO_API_KEY: 082605a1-c449-4636-b389-c66606e85630'
        ];
        $qs = http_build_query($parameters); // query string encode the parameters
        $request = "{$url}?{$qs}"; // create the request URL


        $curl = curl_init(); // Get cURL resource
        // Set cURL options
        curl_setopt_array($curl, array(
        CURLOPT_URL => $request,            // set the request URL
        CURLOPT_HTTPHEADER => $headers,     // set the headers 
        CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
        ));

        $response = curl_exec($curl); // Send the request, save the response
        $data = json_decode($response,true); 
        $data = $data['data'];
        curl_close($curl); // Close request

        foreach ($data as $value) {
            
        } 
        for ($i=0; $i < 20 ; $i++) { 
            
            Cryptocurrency::updateOrCreate(
                [
                    'name' => $data[$i]['name'],
                ]
                ,
                [
                
                'name'=> $data[$i]['name'],
                'symbol' => $data[$i]['symbol'],
                'image' => $data[$i]['name'].'.png',
                'price' => $data[$i]['quote']['USD']['price'],
                'percent_change_1h' => round($data[$i]['quote']['USD']['percent_change_1h'],2),
                'percent_change_24h' => round($data[$i]['quote']['USD']['percent_change_24h'],2),
                'percent_change_7d' => round($data[$i]['quote']['USD']['percent_change_7d'],2),
                'percent_change_30d' => round($data[$i]['quote']['USD']['percent_change_30d'],2),
                'volume_24h' =>round($data[$i]['quote']['USD']['volume_24h'],3),
                'market_cap' =>round($data[$i]['quote']['USD']['market_cap'],3),
                'date_added' => substr($data[$i]['date_added'],0,10),
            ]);
        }
    
    $cryptos = Auth::user()->cryptocurrencies;
    
    if(empty($cryptos)){
        return view('dashboard');
    }else{
        return view('dashboard', compact('cryptos'));
    }
    
})->middleware(['auth'])->name('dashboard');

    // ROUTES OF USER
    
Route::get('user/profile', [UserController::class, 'profile'])
    ->middleware(['auth'])->name('user.profile');
Route::get('user/avatar/{filename}', [UserController::class,'getImage'])
    ->middleware(['auth'])->name('user.avatar'); 
Route::post('user/update', [UserController::class, 'update'])
    ->middleware(['auth'])->name('user.update');
    
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

Route::post('/cryptocurrency/admin/{cryptocurrency}', [CryptocurrencyController::class, 'update'])
->middleware(['auth'])->name('cryptocurrency.admin.update');

Route::get('/cryptocurrency/admin/destroy', [CryptocurrencyController::class, 'destroy'])
->middleware(['auth'])->name('cryptocurrency.admin.destroy');

Route::get('cryptocurrency/avatar/{filename}', [CryptocurrencyController::class,'getImage'])
->middleware(['auth'])->name('crypto.avatar');

    // ROUTES OF EXCHANGE

Route::get('/exchange', [ExchangeController::class, 'index'])
->middleware(['auth'])->name('exchange.index');

Route::get('/exchange/{exchange}/show', [ExchangeController::class, 'show'])
->middleware(['auth'])->name('exchange.show');


    //ROUTES OF  ADMIN EXCHANGE
    
Route::get('/exchange/admin', [AdminExchangeController::class, 'index'])
->middleware(['auth'])->name('exchange.admin.index');
    
Route::get('/exchange/admin/create', [ExchangeController::class, 'create'])
->middleware(['auth'])->name('exchange.admin.create');

Route::get('/exchange/admin/{exchange}/edit', [AdminExchangeController::class, 'edit'])
->middleware(['auth'])->name('exchange.admin.edit');

Route::post('/exchange/admin/{exchange}/update', [AdminExchangeController::class, 'update'])
->middleware(['auth'])->name('exchange.admin.update');

Route::get('/exchange/admin/delete', [ExchangeController::class, 'destroy'])
->middleware(['auth'])->name('exchange.admin.delete');

   // ROUTES OF FOLLOW

Route::post('/cryptocurrency/follow', [FollowController::class, 'new_follow'])
   ->middleware(['auth'])->name('follow.new_follow');
Route::get('/cryptocurrency/unfollow', [FollowController::class, 'delete'])
   ->middleware(['auth'])->name('follow.delete');


require __DIR__.'/auth.php';

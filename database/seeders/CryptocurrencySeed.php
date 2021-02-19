<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CryptocurrencySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cryptocurrencies')->insert([
            'name'=>'Bitcoin',
            'description' => 'Bitcoin es la mejor criptomoneda.',
            'price' => 41000.65,
            'image' => '/resources/img/bitcoin.jpg',
            'vol_market' => 22500.800
        ]);
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExchangeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('exchanges')->insert([
            'name'=>'Binance',
            'image' => 'binance.png',
            'description' => 'Binance es una página sencilla cuyo objetivo es permitirte invertir u operar con criptodivisas como el bitcoin, ethereum, binance coin y Tether. Para que te hagas una idea, solo con el bitcoin hay más de 80 pares disponibles, así que las oportunidades son muchísimas.',
            'website' => 'https://www.binance.com/es/',
            'crypto_number' => 250,
            'assessment' => 9.2,
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('exchanges')->insert([
            'name'=>'Coinbase',
            'image' => 'coinbase.png',
            'description' => 'Coinbase es una plataforma online que actúa por una parte como monedero digital, lo que quiere decir que puedes utilizarla para guardar todas tus criptomonedas en un sitio unificado. En este aspecto, puedes pensar en ella como la aplicación de tu banco, conde puedes ver la cantidad de criptomonedas que tienes y la evolución de su valor.',
            'website' => 'https://www.coinbase.com/',
            'crypto_number' => 50,
            'assessment' => 7.4,
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}

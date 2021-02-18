<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WalletSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('wallets')->insert([
            'user_id' => 1,
            'crypto_id' => 1,
            'quantity' => 2 
        ]);

    }
}

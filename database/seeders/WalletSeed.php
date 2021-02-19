<?php

namespace Database\Seeders;

use App\Models\Wallet;
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
        Wallet::insert([
            'user_id' => 1,
            'cryptocurrency_id' => 1,
            'quantity' => 20 
        ]);

    }
}

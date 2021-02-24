<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContainSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contains')->insert([
            'exchange_id'=> 1,
            'cryptocurrency_id' => 1            
        ]);

        DB::table('contains')->insert([
            'exchange_id'=> 1,
            'cryptocurrency_id' => 2            
        ]);

        DB::table('contains')->insert([
            'exchange_id'=> 2,
            'cryptocurrency_id' => 1            
        ]);

        DB::table('contains')->insert([
            'exchange_id'=> 2,
            'cryptocurrency_id' => 2            
        ]);
    }
}

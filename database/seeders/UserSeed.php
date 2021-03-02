<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Daniel',
            'surname' => 'García',
            'email' => 'daniel@gmail.com',
            'password' =>  Hash::make('12345678'),
            'account_type' => 'admin',
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name'=>'Manuel',
            'surname' => 'Lucero',
            'email' => 'manuel@gmail.com',
            'password' =>  Hash::make('12345678'),
            'account_type' => 'user',
            'created_at' =>  Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' =>  Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}

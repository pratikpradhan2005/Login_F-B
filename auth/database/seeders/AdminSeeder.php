<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Super Admin',
            'email' => 'pratikanshumansarnav@gmail.com', // Change to your preferred email
            'password' => Hash::make('password123'), // Change to a secure password
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
   

}

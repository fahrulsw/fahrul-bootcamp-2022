<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => "Admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make(123456),
            'created_at' => date('Y-m-d-H:i:s'),

        ]);
    }
}

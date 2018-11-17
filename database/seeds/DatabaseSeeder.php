<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Pizza Just',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'role' => 'Admin'
        ]);

        DB::table('users')->insert([
            'name' => 'Pizza Just',
            'email' => 'user@gmail.com',
            'password' => bcrypt('secret'),
            'role' => 'User'
        ]);

        DB::table('pizza')->insert([
            'name_pizza'  => 'Peperoni',
            'price' => '150'
        ]);

        DB::table('pizza')->insert([
            'name_pizza'  => 'Combinada',
            'price' => '175'
        ]);
    }
}

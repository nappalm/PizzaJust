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
            'name' => 'Administrador Jus',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('secret'),
            'role' => 'Admin',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Usuario Just',
            'email' => 'user@gmail.com',
            'password' => bcrypt('secret'),
            'role' => 'User',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('pizza')->insert([
            'name_pizza'  => 'Peperoni',
            'price' => '150',
            'created_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('pizza')->insert([
            'name_pizza'  => 'Combinada',
            'price' => '175',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}

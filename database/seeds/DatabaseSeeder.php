<?php

use Illuminate\Database\Seeder;

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
        	'name' => Str::random(10),
        	'role' => Str::'admin',
        	'email' => Str::random(5). '@utsg.co.id',
        	'password' => bcrypt('rahasia'),
        ]);
    }
}

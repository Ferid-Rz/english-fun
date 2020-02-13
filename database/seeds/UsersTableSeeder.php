<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'ferid',
            'email' => 'ferid@email.com',
            'password' => bcrypt('123'),
        ]);

    }
}
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
            'name' => 'wesley',
            'password' => bcrypt('secret'),
        ]);

        DB::table('users')->insert([
            'name' => 'valente',
            'password' => bcrypt('secret'),
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'name'  => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin123'),
            'is_admin' => 1
        ]);
    }
}

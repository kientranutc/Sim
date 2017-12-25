<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name' => 'Admin',
                'fullname' => 'Admin',
                'email' =>env('EMAIL_ADMIN'),
                'is_admin' =>1,
                'password' => bcrypt('admin@123')
        ]);
    }
}

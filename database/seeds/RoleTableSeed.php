<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $data = [
                [
                        'name' => 'Admin',
                        'slug' => 'admin',
                        'active' =>1
                ],
                [
                        'name' => 'Member',
                        'slug' => 'Member',
                        'active' =>1
                ]
        ];
        foreach ($data as $item) {
        DB::table('role')->insert($item);
        }
    }
}

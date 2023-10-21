<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
            'id' => 1,
            'name' => 'International',
            'nav_status' => 1,
            'status' => 1,
            ],
            [
                'id' => 2,
                'name' => 'Local',
                'nav_status' => 1,
                'status' => 1,
                ],
                [
                    'id' => 3,
                   'name' => 'district',
                      'nav_status' => 0,
                       'status' => 1,
                    ],
    ]);
    }
}

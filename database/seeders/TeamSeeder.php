<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('employees')->insert([
            [
            
            'name' => 'hasan mahmud',
            'designation' => 'Engineer',
            'pic' => 't1.jpg',
            'emaillink' => 'https://gmail.com',
            'linkdnlink' => 'https://www.linkedin.com',
            'status' => 1,
            ],
            [
            
                'name' => 'mehedi hasan',
                'designation' => 'Engineer',
                'pic' => 't2.jpg',
                'emaillink' => 'https://gmail.com',
                'linkdnlink' => 'https://www.linkedin.com',
                'status' => 1,
                ],
                [
            
                    'name' => 'Rakib Hasan ',
            'designation' => 'Engineer',
            'pic' => 't3.jpg',
            'emaillink' => 'https://gmail.com',
            'linkdnlink' => 'https://www.linkedin.com',
            'status' => 1,
                    ],
                    [
            
                        'name' => 'Tanjil Hasan',
                'designation' => 'Engineer',
                'pic' => 't4.jpg',
                'emaillink' => 'https://gmail.com',
                'linkdnlink' => 'https://www.linkedin.com',
                'status' => 1,
                        ],
        ]);
    }
}

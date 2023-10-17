<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class postSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'title' => 'Sample Blog 1',
                'description' => 'This is a sample blog post.',
                'pic' => '1.jpg',
                'slug' => 'sample-blog-1',
                'type' => 1, // Adjust according to your data
                'status' => 1, // Adjust according to your data
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sample Blog 2',
                'description' => 'Another sample blog post.',
                'pic' => '2.jpg',
                'slug' => 'sample-blog-2',
                'type' => 1, // Adjust according to your data
                'status' => 1, // Adjust according to your data
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more records as needed
        ]);
    }
}

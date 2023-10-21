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
                'title' => '25 Years Experience',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.

                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus. Aenean consectetur convallis porttitor. Aliquam interdum at lacus non blandit.',
                'pic' => 'a1.jpg',
                'slug' => '25-Years-Experience',
                'meta_tag' => 'construction,builder,service',
                'type' => 1, // Adjust according to your data
                'status' => 1, // Adjust according to your data
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'We Are Trusted',
                'description' => 'For Your Dream Home',
                'pic' => 'c1.jpg',
                'slug' => 'We-Are-Trusted',
                'meta_tag' => 'construction,builder,service',
                'type' => 3, // Adjust according to your data
                'status' => 1, // Adjust according to your data
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'We Are Professional',
                'description' => 'For Your Dream Project',
                'pic' => 'c2.jpg',
                'slug' => 'We-Are-Professional',
                'meta_tag' => 'construction,builder,service',
                'type' => 3, // Adjust according to your data
                'status' => 1, // Adjust according to your data
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Professional Builder',
                'description' => 'We Build Your Home',
                'pic' => 'c3.jpg',
                'slug' => 'Professional-Builder',
                'meta_tag' => 'construction,builder,service',
                'type' => 3, // Adjust according to your data
                'status' => 1, // Adjust according to your data
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Building Construction',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.',
                'pic' => 's1.jpg',
                'slug' => 'Building-Construction',
                'meta_tag' => 'construction,builder,service',
                'type' => 2, // Adjust according to your data
                'status' => 1, // Adjust according to your data
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'House Renovation',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.',
                'pic' => 's2.jpg',
                'slug' => 'House-Renovation',
                'meta_tag' => 'construction,builder,service',
                'type' => 2, // Adjust according to your data
                'status' => 1, // Adjust according to your data
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Architecture Design',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.',
                'pic' => 's3.jpg',
                'slug' => 'Architecture-Design',
                'meta_tag' => 'construction,builder,service',
                'type' => 2, // Adjust according to your data
                'status' => 1, // Adjust according to your data
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Interior Design',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.',
                'pic' => 's4.jpg',
                'slug' => 'Interior-Design',
                'meta_tag' => 'construction,builder,service',
                'type' => 2, // Adjust according to your data
                'status' => 1, // Adjust according to your data
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Fixing & Support',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.',
                'pic' => 's5.jpg',
                'slug' => 'Fixing-&-Support',
                'meta_tag' => 'construction,builder,service',
                'type' => 2, // Adjust according to your data
                'status' => 1, // Adjust according to your data
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Painting',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.',
                'pic' => 's6.jpg',
                'slug' => 'Painting',
                'meta_tag' => 'construction,builder,service',
                'type' => 2, // Adjust according to your data
                'status' => 1, // Adjust according to your data
                'created_at' => now(),
                'updated_at' => now(),
            ],

            //project start
            [
                'title' => 'Project Name1',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.',
                'pic' => 'p1.jpg',
                'slug' => 'Project Name1',
                'meta_tag' => 'construction,builder,service',
                'type' => 0, // Adjust according to your data
                'status' => 1, // Adjust according to your data
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Project Name2',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.',
                'pic' => 'p2.jpg',
                'slug' => 'Project Name2',
                'meta_tag' => 'construction,builder,service',
                'type' => 0, // Adjust according to your data
                'status' => 1, // Adjust according to your data
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Project Name3',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.',
                'pic' => 'p3.jpg',
                'slug' => 'Project Name3',
                'meta_tag' => 'construction,builder,service',
                'type' => 0, // Adjust according to your data
                'status' => 1, // Adjust according to your data
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Project Name3',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.',
                'pic' => 'p3.jpg',
                'slug' => 'Project Name3',
                'meta_tag' => 'construction,builder,service',
                'type' => 0, // Adjust according to your data
                'status' => 2, // Adjust according to your data
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Add more records as needed
        ]);
    }
}

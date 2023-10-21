<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlogSedder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogmodels')->insert([
            [
                'cat_id'=> '1',
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.',
                'writer_name'=>'Hasan',
                'meta_tag'=>'building,construction',
                'short_des'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi.',
                'pic' => 'b1.jpg',
                'slug' => 'Lorem-ipsum-dolor-sit-amet', 
                'status' => 1, // Adjust according to your data
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
            'cat_id'=> '1',
            'title' => 'Lorem ipsum dolor sit amet',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.',
            'writer_name'=>'Hasan',
            'meta_tag'=>'building,construction',
            'short_des'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi.',
            'pic' => 'b2.jpg',
            'slug' => 'Lorem-ipsum-dolor-sit-amet',
            'status' => 1, // Adjust according to your data
            'created_at' => now(),
            'updated_at' => now(),
        ],
            [
                'cat_id'=> '2',
                'title' => 'Lorem ipsum dolor sit amet',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.',
                'writer_name'=>'Hasan',
                'meta_tag'=>'building,construction',
                'short_des'=>'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi.',
                'pic' => 'b3.jpg',
                'slug' => 'Lorem-ipsum-dolor-sit-amet',
                'status' => 1, // Adjust according to your data
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

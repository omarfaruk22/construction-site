<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clients')->insert([
            [
            
            'name' => 'hasan mahnud',
            'opinion' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic consequatur, error repellendus cum nobis alias deleniti recusandae perferendis unde nihil. Fuga odit qui assumenda tempore adipisci ratione quo dolor enim!',
            'pic' => 'cl1.jpg',
            'profession' => 'Doctor',
            'status' => 1,
            ],
            [
            
                'name' => ' elijabath ',
                'opinion' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic consequatur, error repellendus cum nobis alias deleniti recusandae perferendis unde nihil. Fuga odit qui assumenda tempore adipisci ratione quo dolor enim!',
                'pic' => 'cl2.jpg',
                'profession' => 'Teacher',
                'status' => 1,
                ],
                [
            
                    'name' => 'Taskin Ahamed',
                    'opinion' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Hic consequatur, error repellendus cum nobis alias deleniti recusandae perferendis unde nihil. Fuga odit qui assumenda tempore adipisci ratione quo dolor enim!',
                    'pic' => 'cl3.jpg',
                    'profession' => 'Engineer',
                    'status' => 1,
                    ],
    ]);
    }
}

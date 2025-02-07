<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pizze = [
            [
                'gusto' => 'Margherita',
                'prezzo' => 5.5,
                'available' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'gusto' => 'Diavola',
                'prezzo' => 1,
                'available' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gusto' => 'Ananas',
                'prezzo' => 5000,
                'available' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'gusto' => 'Capricciosa',
                'prezzo' => 7,
                'available' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        DB::table('pizzas')->insert($pizze);
    }
}

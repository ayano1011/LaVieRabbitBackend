<?php

namespace Database\Seeders;

use App\Models\Weight;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class LocalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $raw_data = 8000000;
        $g_data = 0;
        $count = 0;


        for ($i = 0; $i < 100; $i++) {
            $g_data = ($raw_data - 8000000) / 100;
            $count = $g_data / 0.1;

            Weight::factory()
                ->count(1)
                ->create([
                    'raw_data' => $raw_data,
                    'g_data' => $g_data,
                    'count' => $count,
                    'created_at' => fake()->dateTimeBetween('-1 days', '+1 days'),
                ]);
            $raw_data += 500;
        }
    }
}

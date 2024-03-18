<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            IntensitySeeder::class,
            EmotionSeeder::class,
            UserEmotionSeeder::class,
            JournalSeeder::class
        ]);
    }
}

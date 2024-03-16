<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('emotions')->insert([
            ['emotion' => 'Felicidad', 'created_at' => $now, 'updated_at' => $now],
            ['emotion' => 'Tristeza', 'created_at' => $now, 'updated_at' => $now],
            ['emotion' => 'Enojo', 'created_at' => $now, 'updated_at' => $now],
            ['emotion' => 'Miedo', 'created_at' => $now, 'updated_at' => $now],
            ['emotion' => 'Gratitud', 'created_at' => $now, 'updated_at' => $now],
            ['emotion' => 'Amor', 'created_at' => $now, 'updated_at' => $now],
            ['emotion' => 'Empatía', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}

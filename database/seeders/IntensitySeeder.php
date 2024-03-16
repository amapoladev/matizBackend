<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class IntensitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('intensities')->insert([
            ['intensity' => 'Alta', 'created_at' => $now, 'updated_at' => $now],
            ['intensity' => 'Media', 'created_at' => $now, 'updated_at' => $now],
            ['intensity' => 'Baja', 'created_at' => $now, 'updated_at' => $now],
        ]);
    
    }
}

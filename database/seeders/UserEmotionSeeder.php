<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserEmotion;

class UserEmotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserEmotion::factory()->count(10)->create();
    }
}
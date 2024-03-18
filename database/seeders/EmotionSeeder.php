<?php

namespace Database\Seeders;

use App\Models\Emotion;
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

        Emotion::create(['emotion' => 'Alegría', 'emotion_url' => 'https://picsum.photos/200/30https://picsum.photos/200/300']);
        Emotion::create(['emotion' => 'Amor', 'emotion_url' => 'https://picsum.photos/200/300']);
        Emotion::create(['emotion' => 'Enojo', 'emotion_url' => 'https://picsum.photos/200/300']);
        Emotion::create(['emotion' => 'Miedo', 'emotion_url' => 'https://picsum.photos/200/300']);
        Emotion::create(['emotion' => 'Tristeza', 'emotion_url' => 'https://picsum.photos/200/300']);
        Emotion::create(['emotion' => 'Calma', 'emotion_url' => 'https://picsum.photos/200/300']);
        Emotion::create(['emotion' => 'Aburrimiento', 'emotion_url' => 'https://picsum.photos/200/300']);
    }
}

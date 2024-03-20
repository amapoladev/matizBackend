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

        Emotion::create(['emotion' => 'Alegría', 'emotion_url' => 'https://res.cloudinary.com/dhcfg3gds/image/upload/v1710923031/matizemotionary/qgigsoth1ieixkdpb1eb.svg', 'public_id' => 'matizemotionary/qgigsoth1ieixkdpb1eb']);
        Emotion::create(['emotion' => 'Amor', 'emotion_url' => 'https://res.cloudinary.com/dhcfg3gds/image/upload/v1710923024/matizemotionary/knanozzit87bobfm7qhz.svg', 'public_id' => 'matizemotionary/knanozzit87bobfm7qhz']);
        Emotion::create(['emotion' => 'Enojo', 'emotion_url' => 'https://res.cloudinary.com/dhcfg3gds/image/upload/v1710923027/matizemotionary/zrlefq88jxt8ysmogwri.svg', 'public_id' => 'matizemotionary/zrlefq88jxt8ysmogwri']);
        Emotion::create(['emotion' => 'Miedo', 'emotion_url' => 'https://res.cloudinary.com/dhcfg3gds/image/upload/v1710923027/matizemotionary/odqxpolovjb94dz6z2sa.svg', 'public_id' => 'matizemotionary/odqxpolovjb94dz6z2sa']);
        Emotion::create(['emotion' => 'Tristeza', 'emotion_url' => 'https://res.cloudinary.com/dhcfg3gds/image/upload/v1710923028/matizemotionary/w3ogbchkoi1edyu9aj6a.svg', 'public_id' => 'matizemotionary/w3ogbchkoi1edyu9aj6a']);
        Emotion::create(['emotion' => 'Calma', 'emotion_url' => 'https://res.cloudinary.com/dhcfg3gds/image/upload/v1710923025/matizemotionary/fsqpkandczztrsdaf2ko.svg', 'public_id' => 'matizemotionary/fsqpkandczztrsdaf2ko']);
        Emotion::create(['emotion' => 'Aburrimiento', 'emotion_url' => 'https://res.cloudinary.com/dhcfg3gds/image/upload/v1710923030/matizemotionary/aje0ziql722wdm3hilgg.svg', 'public_id' => 'matizemotionary/aje0ziql722wdm3hilgg']);
    }
}

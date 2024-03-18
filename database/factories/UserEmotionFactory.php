<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserEmotion;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserEmotion>
 */
class UserEmotionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserEmotion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'emotion_id' => \App\Models\Emotion::inRandomOrder()->first()->id,
            'intensity' => $this->faker->randomElement(['alta', 'media', 'baja']),
        ];
    }
}
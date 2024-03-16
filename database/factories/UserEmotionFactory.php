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
            'user_id' => $this->faker->numberBetween(1, 10), // Assuming you have users seeded with IDs from 1 to 10
            'emotion_id' => $this->faker->numberBetween(1, 10), // Assuming you have emotions seeded with IDs from 1 to 10
        ];
    }
}
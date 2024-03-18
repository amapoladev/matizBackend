<?php

namespace Database\Factories;

use App\Models\Journal;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class JournalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Journal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'feelingsnotes' => $this->faker->text,
            'date' => $this->faker->date
        ];
    }
}
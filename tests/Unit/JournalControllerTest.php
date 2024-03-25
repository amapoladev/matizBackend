<?php

namespace Tests\Feature\Api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Journal;
use App\Models\User;

class JournalControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function testIndex()
    {
        Journal::factory()->count(3)->create();

    $response = $this->actingAs($user)->post('/journals', [ /* datos del journal */ ]);


        $response->assertStatus(200);
        $response->assertJsonStructure([
            'journals' => [
                '*' => [
                    'id',
                    'user_id',
                    'feelingsnotes',
                    'journal_date',
                    'intensity_id',
                    'emotion_id',
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);
    }

    public function testShow()
    {
        $journal = Journal::factory()->create();

        $response = $this->get('/journals/' . $journal->id); // Cambiado de route('journals.show', $journal->id)

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'journal' => [
                'id',
                'user_id',
                'feelingsnotes',
                'journal_date',
                'intensity_id',
                'emotion_id',
                'created_at',
                'updated_at',
            ],
        ]);
    }

    public function testStore()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user, 'api')->post('/journals', [ // Cambiado de route('journals.store')
            'user_id' => $user->id,
            'feelingsnotes' => $this->faker->text,
            'journal_date' => $this->faker->date,
            'intensity_id' => $this->faker->numberBetween(1, 5),
            'emotion_id' => $this->faker->numberBetween(1, 5),
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure([
            'journal' => [
                'id',
                'user_id',
                'feelingsnotes',
                'journal_date',
                'intensity_id',
                'emotion_id',
                'created_at',
                'updated_at',
            ],
        ]);
    }

    public function testUpdate()
    {
        $journal = Journal::factory()->create();
        $user = $journal->user;

        $response = $this->actingAs($user, 'api')->put('/journals/' . $journal->id, [ // Cambiado de route('journals.update', $journal->id)
            'user_id' => $user->id,
            'feelingsnotes' => $this->faker->text,
            'journal_date' => $this->faker->date,
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'journal' => [
                'id',
                'user_id',
                'feelingsnotes',
                'journal_date',
                'intensity_id',
                'emotion_id',
                'created_at',
                'updated_at',
            ],
        ]);
    }

    public function testDestroy()
    {
        $journal = Journal::factory()->create();
        $user = $journal->user;

        $response = $this->actingAs($user, 'api')->delete('/journals/' . $journal->id); // Cambiado de route('journals.destroy', $journal->id)

        $response->assertStatus(204);
    }
}

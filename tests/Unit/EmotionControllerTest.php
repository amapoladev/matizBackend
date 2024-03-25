<?php

namespace Tests\Unit;
    
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\Models\Emotion;

class EmotionControllerTest extends TestCase
{
        use RefreshDatabase;
        use WithFaker;
    
        public function testIndex()
        {
            Emotion::factory()->count(3)->create();
    
            $response = $this->get(route('emotions.index'));
    
            $response->assertStatus(200);
            $response->assertJsonStructure([
                'emotions' => [
                    '*' => [
                        'id',
                        'emotion',
                        'emotion_url',
                        'public_id',
                        'created_at',
                        'updated_at',
                    ],
                ],
            ]);
        }
    
        public function testShow()
        {
            $emotion = Emotion::factory()->create();
    
            $response = $this->get(route('emotions.show', $emotion->id));
    
            $response->assertStatus(200);
            $response->assertJsonStructure([
                'emotion' => [
                    'id',
                    'emotion',
                    'emotion_url',
                    'public_id',
                    'created_at',
                    'updated_at',
                    'users' => [],
                ],
            ]);
        }
    
        public function testStore()
        {
            $file = UploadedFile::fake()->image('emotion.jpg');
    
            $response = $this->postJson(route('emotions.store'), [
                'emotion' => $this->faker->word,
                'image' => $file,
            ]);
    
            $response->assertStatus(201);
            $response->assertJsonStructure([
                'id',
                'emotion',
                'emotion_url',
                'public_id',
                'created_at',
                'updated_at',
            ]);
        }
    
        public function testUpdate()
        {
            $emotion = Emotion::factory()->create();
    
            $response = $this->putJson(route('emotions.update', $emotion->id), [
                'emotion' => $this->faker->word,
            ]);
    
            $response->assertStatus(200);
            $response->assertJsonStructure([
                'emotion' => [
                    'id',
                    'emotion',
                    'emotion_url',
                    'public_id',
                    'created_at',
                    'updated_at',
                ],
            ]);
        }
    
        public function testDestroy()
        {
            $emotion = Emotion::factory()->create();
    
            $response = $this->delete(route('emotions.destroy', $emotion->id));
    
            $response->assertStatus(204);
        }
    }
 
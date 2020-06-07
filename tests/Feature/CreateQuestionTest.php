<?php

namespace Tests\Feature;

use App\Question;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateQuestionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_user_can_create_a_question()
    {
        $attributes = make(Question::class);

        $this->signIn()
            ->postJson('api/v1/questions', $attributes->toArray())
            ->assertCreated();

        $this->assertDatabaseHas('questions', $attributes->toArray());
    }

    /**
     * @test
     */
    public function an_unauthenticated_user_cannot_create_a_question()
    {
        $attributes = make(Question::class);

        $this->postJson('api/v1/questions', $attributes->toArray())
            ->assertUnauthorized();

        $this->assertDatabaseMissing('questions', $attributes->toArray());
    }

    /**
     * @test
     */
    public function a_question_requires_a_unique_name()
    {
        $question = create(Question::class);

        $this->signIn()
            ->postJson('api/v1/questions', $question->toArray())
            ->assertStatus(422)
            ->assertJsonValidationErrors('name');
    }

    /**
     * @test
     */
    public function a_question_requires_a_name_and_statement()
    {
        $this->signIn()
            ->postJson('api/v1/questions', [])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['name', 'statement']);
    }

    /**
     * @test
     */
    public function a_user_can_update_a_question()
    {
        $question_id = create(Question::class)->id;

        $attributes = make(Question::class);

        $this->assertDatabaseMissing('questions', $attributes->toArray());

        $this->signIn()
            ->putJson("api/v1/questions/{$question_id}", $attributes->toArray())
            ->assertOK();

        $this->assertDatabaseHas('questions', $attributes->toArray());
    }

    /**
     * @test
     */
    public function a_question_cannot_be_updated_with_an_existing_name()
    {
        create(Question::class, ['name' => 'age']);
        $qn_2 = create(Question::class);

        $this->signIn()
            ->putJson("api/v1/questions/{$qn_2->id}", ['name' => 'age'])
            ->assertStatus(422)
            ->assertJsonValidationErrors('name');
    }
}

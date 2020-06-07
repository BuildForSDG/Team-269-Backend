<?php

namespace Tests\Feature;

use App\Question;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReadQuestionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_user_can_get_questions()
    {
        $questions = create(Question::class, [], 3);

        $this->signIn()
            ->getJson('api/v1/questions')
            ->assertOK()
            ->assertJson($questions->toArray());
    }

    /**
     * @test
     */
    public function a_user_can_get_a_question()
    {
        $question = create(Question::class);

        $this->signIn()
            ->getJson("api/v1/questions/{$question->id}")
            ->assertOK()
            ->assertJson($question->toArray());
    }
}

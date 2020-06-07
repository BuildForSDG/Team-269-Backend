<?php

namespace Tests\Unit;

use App\Question;
use Tests\TestCase;
use Illuminate\Support\Collection;
use Illuminate\Foundation\Testing\RefreshDatabase;

class QuestionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_question_has_responses()
    {
        $question = create(Question::class);

        $this->assertInstanceOf(Collection::class, $question->responses);
    }
}

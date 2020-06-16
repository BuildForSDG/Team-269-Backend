<?php

namespace Tests\Unit;

use App\Question;
use App\SurveyResponse;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SurveyResponseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_survey_response_belongs_to_a_question()
    {
        //$this->withoutExceptionHandling();
        $question = create(Question::class);
        $survey_response = create(SurveyResponse::class, ['question_id'=>$question->id]);
        $this->assertInstanceOf(Question::class, $survey_response->question);

    }
}

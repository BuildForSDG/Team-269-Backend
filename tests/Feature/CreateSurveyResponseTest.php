<?php

namespace Tests\Feature;

use App\SurveyResponse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateSurveyResponseTest extends TestCase
{
    /**
     * @test
     */

    public function a_user_can_create_a_survey_response()
    {
        $this->withoutExceptionHandling();
        //given a signed in user
        $this-> signIn();
        //when they create a survey response
        $survey_response = make(SurveyResponse::class);
        $this->postJson('api/v1/survey-responses', $survey_response->toArray())
            ->assertCreated();
        //it should be tagged to question that exists in the db
        $this->assertDatabaseHas('questions', $survey_response->toArray());

    }
}

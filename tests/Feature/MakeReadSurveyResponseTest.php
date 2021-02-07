<?php

namespace Tests\Feature;

use App\SurveyResponse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MakeReadSurveyResponseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_user_can_get_survey_responses()
    {
        /**
         * Given a signed in user
         * If survey responses exist
         * They can successfully get the responses
         */
        $this->withoutExceptionHandling();
        // $this->expectException();
        $survey_responses = create(SurveyResponse::class, [], 3);
        //dd($survey_responses->toArray());

        $this->signIn()
            ->getJson('api/v1/survey-responses')
            ->assertOK()
            ->assertJson($survey_responses->toArray());
    }

    /**
     * @test
     */
    public function a_user_can_get_a_survey_response()
    {
        /**
         * Given a signed in user
         * If a survey response exists
         * They can successfully get the response
         */
        //$this->withoutExceptionHandling();
        $survey_response = create(SurveyResponse::class);
        $this->signIn()
            ->getJson("api/v1/survey-responses/{$survey_response->id}")
            ->assertOK()
            ->assertJson($survey_response->toArray());
    }
}

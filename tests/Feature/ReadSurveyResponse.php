<?php

namespace Tests\Feature;

use App\SurveyResponse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReadSurveyResponse extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_user_can_get_survey_responses()
    {
        //$this->withoutExceptionHandling();
       // $this->expectException();
        $survey_responses = create(SurveyResponse::class, [], 3);
        //dd($survey_responses->toArray());

        $this->signIn()
            ->getJson('api/v1/survey-responses')
            ->assertOK()
            ->assertJson()
            ->assertJson($survey_responses->toArray());

    }

    /**
     * @test
     */
    public function a_user_can_get_a_survey_response()
    {
        $this->withoutExceptionHandling();
        $survey_response = create(SurveyResponse::class);
        $this->signIn()
            ->getJson("api/v1/survey-responses/{$survey_response->id}")
            ->assertOK()
            ->assertJson($survey_response->toArray());
    }
}

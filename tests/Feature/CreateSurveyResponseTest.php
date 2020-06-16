<?php

namespace Tests\Feature;

use App\SurveyResponse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateSurveyResponseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */

    public function a_user_can_submit_a_survey_response()
    {
        //$this->withoutExceptionHandling();

        //create survey response in memory
        $attributes = make(SurveyResponse::class);
        //given an authenticated user trying to create a survey response
        $this->signIn()
            ->postJson('api/v1/survey-responses', $attributes->toArray())
            ->assertCreated();
        //the response is created and persists
        $this->assertDatabaseHas('survey_responses', $attributes->toArray());


    }

    /**
     * @test
     */

    public function an_unauthenticated_user_cannot_submit_a_survey_response()
    {
        //$this->withoutExceptionHandling();
       //$this->expectException();
        $survey_response = make(SurveyResponse::class);

        $this->postJson('api/v1/survey-responses', $survey_response->toArray())
            ->assertUnauthorized();

        $this->assertDatabaseMissing('survey_responses', $survey_response->toArray());

    }


    /**
     * @test
     */
    public function a_survey_response_requires_all_fields_except_the_custom_response()
    {
        //$this->withoutExceptionHandling();
       // $survey_response = make(SurveyResponse::class);
        //dd($survey_response);
        $this->signIn()
            ->postJson('api/v1/survey-responses', [])
            ->assertStatus(422)
            ->assertJsonValidationErrors([
                'survey_id',
                'question_id',
                'survey_location_id',
                'response_option_id',
                ]);
    }

    /**
     * @test
     */
    public function a_user_can_update_a_survey_response()
    {
        $this->withoutExceptionHandling();
        $survey_response_id = create(SurveyResponse::class)->id;

        $attributes = make(SurveyResponse::class);

        $this->assertDatabaseMissing('survey_responses', $attributes->toArray());

        $this->signIn()
            ->putJson("api/v1/survey-responses/{$survey_response_id}", $attributes->toArray())
            ->assertOK();

        $this->assertDatabaseHas('survey_responses', $attributes->toArray());
    }




}

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
        /**
         * Given a signed in user
         * If they try to submit/post a survey response
         * The response is created and exists in the database.
         */
        //$this->withoutExceptionHandling();

        //create survey response in memory
        $attributes = make(SurveyResponse::class);
        $this->signIn()
            ->postJson('api/v1/survey-responses', $attributes->toArray())
            ->assertCreated();

        $this->assertDatabaseHas('survey_responses', $attributes->toArray());


    }

    /**
     * @test
     */

    public function an_unauthenticated_user_cannot_submit_a_survey_response()
    {
        /**
         * Given a user who is not signed in
         * When they try to submit/post a survey response
         * The response is not saved to the database
         */
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
        /**
         * Given a signed in user
         * When they try to submit/post a survey response
         * Only the custom response filed should be optional
         */
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
        /**
         * Given a signed in user
         * When they try to update an existing survey response
         * The changes successfully save to the database
         */
        //$this->withoutExceptionHandling();
        $survey_response_id = create(SurveyResponse::class)->id;

        $attributes = make(SurveyResponse::class);

        $this->assertDatabaseMissing('survey_responses', $attributes->toArray());

        $this->signIn()
            ->putJson("api/v1/survey-responses/{$survey_response_id}", $attributes->toArray())
            ->assertOK();

        $this->assertDatabaseHas('survey_responses', $attributes->toArray());
    }



}

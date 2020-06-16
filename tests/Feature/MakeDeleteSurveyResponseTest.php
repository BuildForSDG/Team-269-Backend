<?php

namespace Tests\Feature;

use App\SurveyResponse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MakeDeleteSurveyResponseTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function a_user_can_delete_a_survey_response()
    {
        /**
         * Given a signed in user
         * when the user deletes a survey response
         * the survey response is removed from the database
         */
        $this->withoutExceptionHandling();
        $survey_response = create(SurveyResponse::class);
        $this->signIn()
            ->deleteJson("api/v1/survey-responses/{$survey_response->id}");
        $this->assertDatabaseMissing('survey_responses', $survey_response->toArray());
    }
}

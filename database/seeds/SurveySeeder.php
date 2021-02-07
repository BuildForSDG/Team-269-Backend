<?php

use App\District;
use App\DistrictDivision;
use App\Question;
use App\ResponseOption;
use App\Survey;
use App\SurveyLocation;
use App\SurveyResponse;
use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Survey::class, 1)->create();
        factory(Question::class, 30)->create();
        factory(ResponseOption::class, 120)->create();
        factory(District::class, 30)->create();
        factory(DistrictDivision::class, 30)->create();
        factory(SurveyLocation::class, 30)->create();
        factory(SurveyResponse::class, 20)->create();
    }
}

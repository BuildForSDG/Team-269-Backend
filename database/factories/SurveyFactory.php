<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\District;
use App\SurveyLocation;
use App\Question;
use App\ResponseOption;
use App\SurveyResponse;
use App\DistrictDivision;
use Faker\Generator as Faker;

// Districts
$factory->define(District::class, function (Faker $faker) {
    return [
        'name' => $faker->state,
    ];
});
// District Division
$factory->define(DistrictDivision::class, function (Faker $faker) {
    return [
        'name' => $faker->city,
        'district_id' => function () {
            return factory(District::class)->create()->id;
        },
    ];
});
// Location
$factory->define(SurveyLocation::class, function (Faker $faker) {
    return [
        'location_name' => $faker->city,
        'district_division_id' => function () {
            return factory(DistrictDivision::class)->create()->id;
        },
    ];
});
// Question
$factory->define(Question::class, function (Faker $faker) {
    return [
        'statement' => $faker->sentence,
        'name' => $faker->unique()->word,
    ];
});
// ResponseOption
$factory->define(ResponseOption::class, function (Faker $faker) {
    return [
        'option_value' => $faker->word,
        'option_name' => $faker->sentence,
        'question_id' => function () {
            return factory(Question::class)->create()->id;
        },
    ];
});
// Survey
$factory->define(Survey::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
    ];
});
// SurveyResponse
$factory->define(SurveyResponse::class, function (Faker $faker) {
    return [
        'survey_id' => function () {
            return factory(Survey::class)->create()->id;
        },
        'question_id' => function () {
            return factory(Question::class)->create()->id;
        },
        'survey_location_id' => function () {
            return factory(SurveyLocation::class)->create()->id;
        },
        'response_option_id' => function () {
            return factory(ResponseOption::class)->create()->id;
        },
    ];
});

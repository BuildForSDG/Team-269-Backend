<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyResponse2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_response2s', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id');

            $table->unsignedBigInteger('location_id');

            $table->string('gender');

            $table->integer('age');

            $table->string('marital_status');

            $table->string('country');

            $table->string('district');

            $table->string('house_hold_status');

            $table->string('literacy');

            $table->string('highest_education');

            $table->string('chronic_illnesses');

            $table->string('disability');

            $table->string('distance_to_health_center');

            $table->string('occupation');

            $table->string('income_source');

            $table->string('income_type');

            $table->integer('earning');

            $table->string('assets');

            $table->string('access_to_water');

            $table->string('water_source');

            $table->string('toilet_type');

            $table->string('toilet_safety');

            $table->string('bathroom_type');

            $table->string('waste_disposal');

            $table->string('cooking_fuel');

            $table->string('access_to_electricity');

            $table->string('access_to_alternative_energy');

            $table->string('lighting_source');

            $table->string('house_ownership');

            $table->string('house_roofing');

            $table->string('house_walls');

            $table->string('house_floor');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_response2s');
    }
}

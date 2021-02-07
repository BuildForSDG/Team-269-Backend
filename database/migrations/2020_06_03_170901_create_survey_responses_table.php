<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_responses', function (Blueprint $table) {
            $table->id('id');
            //$table->foreignId('survey_id')->constrained()->onDelete('cascade')->nullable();
            $table->foreignId('survey_id')->constrained('surveys');
            $table->foreignId('question_id')->constrained('questions');
            $table->foreignId('survey_location_id')->constrained('survey_locations');
            $table->foreignId('response_option_id')->constrained('response_options')->nullable();
            $table->string('custom_response')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_responses');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipDeanRecommendationPortal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_dean_recommendation_portal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('random_url');
            $table->integer('dean_application_id')->unsigned()->nullable();
            $table->boolean('recommendation_submitted')->nullable();
            $table->unsignedBigInteger('num_visit')->nullable();
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
        Schema::dropIfExists('scholarship_dean_recommendation_portal');
    }
}

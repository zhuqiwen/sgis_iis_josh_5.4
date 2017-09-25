<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipApplicationDeanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('scholarship_application_dean', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('intern_application_id')->unsigned();
            $table->string('recommender_first_name')->nullable();
            $table->string('recommender_last_name')->nullable();
            $table->string('recommender_prefix')->nullable();
            $table->string('recommender_email')->nullable();
            $table->string('recommender_department')->nullable();
            $table->text('recommender_recommendation')->nullable();
            $table->boolean('ferpa_waive');
            $table->string('transcript_file_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('scholarship_application_dean');
    }
}

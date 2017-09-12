<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFundingOverseasStudyApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('funding_overseas_study_application', function (Blueprint $table){
            $table->increments('id');
            $table->integer('intern_application_id')->unsigned()->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('scholarship_id')->unsigned()->nullable();
            $table->integer('funding_requested_amount')->nullable();
            $table->boolean('other_funding_applied')->nullable()->default(0);
            $table->string('other_funding_name')->nullable();
            $table->boolean('additional_funding_received')->nullable()->default(0);
            $table->string('additional_funding_source')->nullable();
            $table->float('additional_funding_amount', 10, 2)->nullable();
            $table->boolean('this_funding_before')->nullable()->default(0);
            $table->string('this_funding_before_semester')->nullable();
            $table->integer('this_funding_before_amount')->nullable();
            $table->string('fosa_recommendation_name_1')->nullable();
            $table->string('fosa_recommendation_name_2')->nullable();
            $table->string('fosa_recommendation_email_1')->nullable();
            $table->string('fosa_recommendation_email_2')->nullable();
            $table->text('fosa_personal_statement')->nullable();
            $table->text('fosa_promotional_bio')->nullable();
            $table->date('fosa_submitted_on')->nullable();
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
        Schema::dropIfExists('funding_overseas_study_application');

    }
}

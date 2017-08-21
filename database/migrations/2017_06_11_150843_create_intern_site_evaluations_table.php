<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternSiteEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('intern_site_evaluations', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer('internship_id')->unsigned();
		    $table->text('how_did_locate')->nullable();
		    $table->text('site_description')->nullable();
		    $table->text('task_description')->nullable();
		    $table->text('fit_into_study')->nullable();
		    $table->text('site_strength')->nullable();
		    $table->text('site_weakness')->nullable();
		    $table->text('gained_skills')->nullable();
		    $table->text('brief_comment')->nullable();
		    // the scale is 0-9
		    $table->tinyInteger('willing_to_recommend')->nullable();
		    $table->date('intern_site_evaluation_due_date')->nullable();
		    $table->date('intern_site_evaluation_submitted_on')->nullable();

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
        Schema::dropIfExists('intern_site_evaluations');
    }
}

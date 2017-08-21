<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternStudentEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
	    // here we assume that the midterm evaluation has the same entries as final evaluation
        // otherwise, we will need a new table/entity for midterm.
		Schema::create('intern_student_evaluations', function (Blueprint $table) {
			$table->increments('id');
            $table->integer('internship_id')->unsigned();
			$table->text('intern_student_evaluation_performance_comment')->nullable();
			$table->boolean('intern_student_evaluation_has_noteworthy')->nullable();
			$table->text('intern_student_evaluation_noteworthy_aspects')->nullable();
			$table->boolean('intern_student_evaluation_need_improve')->nullable();
			$table->text('intern_student_evaluation_student_weakness')->nullable();
			$table->text('intern_student_evaluation_weakness_remedy')->nullable();
			$table->text('intern_student_evaluation_suitability')->nullable();
			$table->text('intern_student_evaluation_job_advice')->nullable();
			// 5 options are:
			// Outstanding (top 10%)
			// Good (top 25%)
			// Fair (top 50%)
			// Poor (bottom 50%)
			// Unable to compare
			$table->string('intern_student_evaluation_performance_rating')->nullable();
			// 4 options are:
			// Outstanding (top 10%)
			// Good (top 25%)
			// Fair (top 50%)
			// Poor (bottom 50%)
			$table->string('intern_student_evaluation_development_rating')->nullable();
			// to tell if an evaluation is a midterm or a final
			$table->boolean('intern_student_evaluation_is_midterm')->default(0);
			// once the evaluation is submitted, NO ONE can update it anymore.
            $table->date('intern_student_evaluation_due_date')->nullable();
			$table->date('intern_student_evaluation_submitted_on')->nullable();
			$table->date('intern_student_evaluation_request_sent_on')->nullable();
			$table->integer('intern_student_evaluation_request_sent_by')->unsigned()->nullable();
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
		Schema::dropIfExists('intern_student_evaluations');
	}
}

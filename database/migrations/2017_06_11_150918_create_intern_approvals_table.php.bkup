<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternApprovalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('intern_approvals', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('application_id')->unsigned();
			$table->foreign('application_id')->references('id')->on('intern_applications');
			$table->text('application_notes');
			$table->text('final_notes');
			$table->tinyInteger('x373_hours');
			$table->boolean('journal_submitted');
			$table->boolean('reflection_submitted');
			$table->boolean('site_eval_submitted');
			$table->dateTime('midterm_eval_sent_date');
			$table->boolean('midterm_eval_received');
			$table->dateTime('final_eval_sent_date');
			$table->boolean('final_eval_received');
			$table->string('x373_grade')->nullable();
			$table->boolean('case_closed');
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
		Schema::dropIfExists('intern_approvals');
	}
}

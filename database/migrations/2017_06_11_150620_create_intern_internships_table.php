<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternInternshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('intern_internships', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('application_id')->unsigned();
			$table->text('intern_internship_application_approval_notes')->nullable();
			$table->text('intern_internship_final_notes')->nullable();
			$table->tinyInteger('intern_internship_x373_hours')->nullable();
			$table->string('intern_internship_x373_grade')->nullable();
			$table->date('intern_internship_case_closed_date')->nullable();
			$table->integer('intern_internship_closed_by')->unsigned()->nullable();
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
		Schema::dropIfExists('intern_internships');
	}
}

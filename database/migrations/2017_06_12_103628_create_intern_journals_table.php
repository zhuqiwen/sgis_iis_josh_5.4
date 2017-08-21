<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternJournalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('intern_journals', function (Blueprint $table) {
			$table->increments('id');
            $table->integer('internship_id')->unsigned();
			$table->text('intern_journal_content')->nullable();

			$table->smallInteger('intern_journal_serial_num')->nullable();
			$table->smallInteger('intern_journal_required_total_num')->nullable();

            $table->date('intern_journal_due_date')->nullable();
            $table->date('intern_journal_submitted_at')->nullable();
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
		Schema::dropIfExists('intern_journals');
	}
}

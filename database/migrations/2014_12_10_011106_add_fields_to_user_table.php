<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			// add bio,gender,dob,pic,country,state,city,address,postal
			$table->text('bio')->nullable();
			$table->string('gender')->nullable();
			$table->date('dob')->nullable();
			$table->string('pic')->nullable();
			$table->string('country')->nullable();
			$table->string('state')->nullable();
			$table->string('city')->nullable();
			$table->string('street')->nullable();
			$table->string('postal')->nullable();
			$table->string('phone')->nullable();
			$table->string('sgis_major_1')->nullable();
			$table->string('sgis_major_2')->nullable();
			$table->string('sgis_minor_1')->nullable();
			$table->string('sgis_minor_2')->nullable();
			$table->string('other_minor')->nullable();
			$table->date('expected_graduation_date')->nullable();
			$table->float('cumulative_gpa', 3, 2)->nullable();

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			// delete above columns
			$table->dropColumn(array('bio', 'gender', 'dob', 'pic', 'country', 'state', 'city', 'address', 'postal'));
		});
	}

}

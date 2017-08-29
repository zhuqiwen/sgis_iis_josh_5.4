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
			$table->text('user_bio')->nullable();
			$table->string('user_gender')->nullable();
			$table->date('user_dob')->nullable();
			$table->string('user_pic')->nullable();
			$table->string('user_country')->nullable();
			$table->string('user_state')->nullable();
			$table->string('user_city')->nullable();
			$table->string('user_street')->nullable();
			$table->string('user_postal')->nullable();
			$table->string('user_phone')->nullable();
			$table->string('user_sgis_major_1')->nullable();
			$table->string('user_sgis_major_2')->nullable();
			$table->string('user_sgis_minor_1')->nullable();
			$table->string('user_sgis_minor_2')->nullable();
			$table->string('user_other_minor')->nullable();
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('states', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('region_id')->unsigned();
			$table->integer('country_id')->unsigned();
			$table->string('region');
			$table->string('code');
			$table->string('admin_code');
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
		Schema::dropIfExists('states');
	}
}

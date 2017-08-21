<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
	public function up()
	{
		Schema::create('cities', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('city_id');
			$table->integer('country_id');
			$table->integer('region_id');
			$table->string('city');
			$table->float('latitude');
			$table->float('longitude');
			$table->string('time_zone');
			$table->string('code')->nullable()->default(NULL);
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
		Schema::dropIfExists('cities');
	}
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('countries', function (Blueprint $table) {
		    $table->increments('id');
		    $table->integer('country_id')->unsigned();
		    $table->string('country');
		    $table->string('fips104');
		    $table->string('iso2');
		    $table->string('iso3');
		    $table->string('ison');
		    $table->string('internet');
		    $table->string('capital')->nullable()->default(NULL);
		    $table->string('map_reference')->nullable()->default(NULL);
		    $table->string('nationality_singular')->nullable()->default(NULL);
		    $table->string('nationality_plural')->nullable()->default(NULL);
		    $table->string('currency')->nullable()->default(NULL);
		    $table->string('currency_code')->nullable()->default(NULL);
		    $table->bigInteger('population')->nullable()->default(NULL);
		    $table->string('title')->nullable()->default(NULL);
		    $table->string('comment')->nullable()->default(NULL);
		    $table->string('phone_code')->nullable()->default(NULL);
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
        Schema::dropIfExists('countries');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('alum_employments', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('employment_job_title')->nullable();
		    $table->string('employment_country')->nullable();
		    $table->string('employment_state')->nullable();
		    $table->string('employment_city')->nullable();
		    $table->integer('contact_id')->unsigned();
		    $table->integer('employer_id')->unsigned();
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
	    Schema::dropIfExists('alum_employments');

    }
}

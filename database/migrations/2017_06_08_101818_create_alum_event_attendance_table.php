<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumEventAttendanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('alum_event_attendance', function(Blueprint $table){
		    $table->increments('id');
		    $table->integer('contact_id')->unsigned();
		    $table->integer('event_id')->unsigned();
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
	    Schema::dropIfExists('alum_event_attendance');
    }
}

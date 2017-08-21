<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('alum_events', function(Blueprint $table){
		    $table->increments('id');
		    $table->string('event_name')->nullable();
		    $table->date('event_date')->nullable();
		    $table->string('event_country')->nullable();
		    $table->string('event_state')->nullable();
		    $table->string('event_city')->nullable();
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
	    Schema::dropIfExists('alum_events');

    }
}

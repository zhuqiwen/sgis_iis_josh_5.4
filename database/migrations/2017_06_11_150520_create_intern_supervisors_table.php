<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('intern_supervisors', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('intern_supervisor_first_name')->nullable();
		    $table->string('intern_supervisor_last_name')->nullable();
		    $table->string('intern_supervisor_prefix')->nullable();
		    $table->string('intern_supervisor_email')->nullable();
		    $table->string('intern_supervisor_phone')->nullable();
		    $table->integer('intern_organization_id')->unsigned();
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
	    Schema::dropIfExists('intern_supervisors');
    }
}

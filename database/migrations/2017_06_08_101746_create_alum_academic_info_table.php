<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumAcademicInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('alum_academic_info', function(Blueprint $table){
		    $table->increments('id');
		    $table->date('academic_info_class_year')->nullable();
		    $table->string('academic_info_degree')->nullable();
		    $table->integer('contact_id')->unsigned();
		    $table->integer('study_field_id')->unsigned();
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
	    Schema::dropIfExists('alum_academic_info');

    }
}

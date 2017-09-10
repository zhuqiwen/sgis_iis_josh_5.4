<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	    Schema::create('alum_donations', function (Blueprint $table){
		    $table->increments('id');
		    $table->integer('contact_id')->unsigned();
		    $table->string('donation_date')->nullable()->default(NULL);
		    $table->string('donation_form')->nullable()->default(NULL);
		    $table->string('donation_amount')->nullable()->default(NULL);
		    $table->integer('donation_sum')->nullable()->default(NULL);
		    $table->text('donation_note')->nullable()->default(NULL);
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
        //
	    Schema::dropIfExists('alum_donations');
    }
}

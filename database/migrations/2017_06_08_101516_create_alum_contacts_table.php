<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlumContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	    Schema::create('alum_contacts', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('contact_first_name')->nullable();
		    $table->string('contact_middle_name')->nullable();
		    $table->string('contact_last_name')->nullable();
		    $table->string('contact_email')->nullable();
		    $table->string('contact_phone_home')->nullable();
		    $table->string('contact_phone_mobile')->nullable();
		    $table->string('contact_country')->nullable();
		    $table->string('contact_state')->nullable();
		    $table->string('contact_city')->nullable();
		    $table->string('contact_line1')->nullable();
		    $table->string('contact_line2')->nullable();
		    $table->string('contact_zip')->nullable();
		    $table->boolean('contact_no_email')->default(FALSE);
		    $table->boolean('contact_no_phone_call')->default(FALSE);
		    $table->boolean('contact_no_mail')->default(FALSE);
		    $table->boolean('contact_iuaa_member')->default(FALSE);
		    $table->boolean('contact_share_with_iuaa')->default(FALSE);
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
	    Schema::dropIfExists('alum_contacts');

    }
}

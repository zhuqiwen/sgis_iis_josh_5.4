<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
	    Schema::create('intern_organizations', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('intern_organization_name')->nullable();
		    $table->string('intern_organization_url')->nullable();
		    $table->string('intern_organization_type')->nullable();
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
	    Schema::dropIfExists('intern_organizations');
    }
}

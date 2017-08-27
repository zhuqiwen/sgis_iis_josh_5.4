<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternSupervisorPortalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('intern_supervisor_portal', function (Blueprint $table){
            $table->increments('id');
            $table->string('random_url');
            $table->integer('supervisor_id')->unsigned()->nullable();
            $table->integer('internship_id')->unsigned()->nullable();
            $table->boolean('form_submitted')->nullable();
            $table->unsignedBigInteger('num_visit')->nullable();
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
    }
}

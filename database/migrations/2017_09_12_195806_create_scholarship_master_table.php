<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarship_master', function (Blueprint $table) {
            $table->increments('id');
	        $table->string('scholarship_title');
	        $table->text('scholarship_introduction')->nullable();
	        $table->string('scholarship_award_amount')->nullable()->default('vary');
	        $table->integer('scholarship_admin')->unsigned();
	        $table->dateTime('scholarship_deadline')->nullable();
	        $table->text('scholarship_about_donor')->nullable();
	        $table->text('scholarship_notes')->nullable();
	        $table->string('scholarship_type')->nullable();
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
        Schema::dropIfExists('scholarship_master');
    }
}

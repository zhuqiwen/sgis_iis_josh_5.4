<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInternApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	    Schema::create('intern_applications', function (Blueprint $table) {
		    $table->increments('id');
		    $table->string('intern_application_year')->nullable();
		    $table->string('intern_application_term')->nullable();
		    $table->string('intern_application_country')->nullable();
		    $table->string('intern_application_state')->nullable();
		    $table->string('intern_application_city')->nullable();
		    $table->string('intern_application_street')->nullable();
		    $table->integer('intern_application_credit_hours')->nullable();
		    $table->integer('intern_application_budget_airfare')->nullable();
		    $table->integer('intern_application_budget_housing')->nullable();
		    $table->integer('intern_application_budget_meals')->nullable();
		    $table->integer('intern_application_budget_transportation')->nullable();
		    $table->integer('intern_application_budget_others')->nullable();
		    $table->date('intern_application_depart_date')->nullable();
		    $table->date('intern_application_return_date')->nullable();
		    $table->date('intern_application_start_date')->nullable();
		    $table->date('intern_application_end_date')->nullable();
		    $table->integer('intern_application_work_hours_per_week')->nullable();
		    $table->text('intern_application_work_schedule')->nullable();
		    $table->text('intern_application_description')->nullable();
		    $table->text('intern_application_reasons')->nullable();
		    $table->text('intern_application_cultural_interaction')->nullable();
		    $table->text('intern_application_challenges')->nullable();
		    $table->integer('user_id')->unsigned();
		    $table->integer('intern_organization_id')->unsigned();
		    $table->integer('intern_supervisor_id')->unsigned();
		    $table->boolean('intern_application_paid_internship')->default(FALSE);
		    $table->date('intern_application_approved_date')->nullable();
		    $table->integer('intern_application_approved_by')->unsigned()->nullable();
		    $table->date('intern_application_submitted_date')->nullable();
		    $table->string('intern_application_submitted_by')->nullable();
		    $table->integer('country_warning_id')->default(0);
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
	    Schema::dropIfExists('intern_applications');
    }
}

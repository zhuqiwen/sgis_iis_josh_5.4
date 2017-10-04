<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->string('to')->nullable();
            $table->string('from')->nullable();
            $table->string('cc')->nullable();
            $table->string('bcc')->nullable();
            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->integer('type_record_id')->nullable();
            $table->text('body')->nullable();
            $table->text('attachments')->nullable();
            $table->boolean('sent')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}

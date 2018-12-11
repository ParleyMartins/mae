<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSessionDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_days', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('massage_session_id');
            $table->string('status');

            $table->date('day');
            $table->time('start_time');

            $table->foreign('massage_session_id')->references('id')->on('massage_sessions')->onDelete('cascade');

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
        Schema::dropIfExists('session_days');
    }
}

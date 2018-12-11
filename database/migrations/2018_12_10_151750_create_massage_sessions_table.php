<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMassageSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('massage_sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('client_id');
            $table->unsignedInteger('anamnese_id')->nullable();

            // This is a polymorphic relationship with massage or package
            $table->unsignedInteger('session_id');
            $table->string('session_type');

            $table->string('status')->default('SCHEDULED');

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('anamnese_id')->references('id')->on('anamneses')->onDelete('cascade');

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
        Schema::dropIfExists('massage_sessions');
    }
}

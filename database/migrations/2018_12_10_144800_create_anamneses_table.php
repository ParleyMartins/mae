<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnamnesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anamneses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('client_id');
            $table->boolean('edema');
            $table->boolean('diabetes');
            $table->boolean('cancer');
            $table->boolean('highblood_pressure');
            $table->boolean('epilepsy');
            $table->boolean('pacemaker');
            $table->boolean('varices');
            $table->boolean('thrombosis');
            $table->boolean('heart_disease');
            $table->boolean('medical_treatment');
            $table->boolean('pain_sensibility');
            $table->boolean('pin');
            $table->boolean('period');
            $table->boolean('medicines');
            $table->text('medicines_which')->nullable();
            $table->boolean('alergies');
            $table->text('alergies_which')->nullable();

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            
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
        Schema::dropIfExists('anamneses');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMassagePackageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('massage_package', function (Blueprint $table) {
            $table->unsignedInteger('massage_id');
            $table->unsignedInteger('package_id');
            $table->unsignedInteger('price');
            $table->unsignedInteger('amount')->default(1);
            $table->unsignedInteger('duration')->nullable();

            $table->foreign('massage_id')->references('id')->on('massages');
            $table->foreign('package_id')->references('id')->on('packages');
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
        Schema::dropIfExists('massage_package');
    }
}

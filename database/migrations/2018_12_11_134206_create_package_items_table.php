<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackageItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_items', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('massage_id');
            $table->unsignedInteger('package_id');
            $table->unsignedInteger('price')->nullable();
            $table->unsignedInteger('duration')->nullable();
            $table->unsignedInteger('amount')->default(1);

            $table->foreign('massage_id')->references('id')->on('massages')->onDelete('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');

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
        Schema::dropIfExists('package_items');
    }
}

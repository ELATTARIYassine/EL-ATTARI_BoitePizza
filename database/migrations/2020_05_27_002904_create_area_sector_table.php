<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAreaSectorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_sector', function (Blueprint $table) {
            $table->integer('area_id')->unsigned();
            $table->integer('sector_id')->unsigned();
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');;
            $table->foreign('sector_id')->references('id')->on('sectors')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('area_sector');
    }
}

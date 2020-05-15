<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElementBaseProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elementsbase_product', function (Blueprint $table) {
            $table->integer('elementsbase_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->foreign('elementsbase_id')->references('id')->on('elementsbases')->onDelete('cascade');;
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('element_base_product');
    }
}

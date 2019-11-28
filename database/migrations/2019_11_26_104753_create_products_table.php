<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 30);
            $table->string('image_url');
            $table->float('price_in');
            $table->float('price_out');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categorys');
            $table->unsignedInteger('provider_id');
            $table->foreign('provider_id')->references('id')->on('providers');
            $table->string('color', 20);
            $table->tinyInteger('size');
            $table->string('sex');
            $table->integer('count_by');
            $table->boolean('status');
            $table->dateTime('created_at');
        });
    }
    
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}

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
            $table->string('image_font');
            $table->string('image_back');
            $table->string('image_up');
            $table->boolean('sex');
            $table->integer('price');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categorys');
            $table->tinyInteger('high');
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

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email', 100);
            $table->string('name', 50);
            $table->string('avata_url', 255);
            $table->string('password', 255);
            $table->string('address', 100)->nullable();
            $table->string('phone', 20)->nullable();
            $table->tinyInteger('role');
            $table->string('remember_token', 100)->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('customers');
    }
}

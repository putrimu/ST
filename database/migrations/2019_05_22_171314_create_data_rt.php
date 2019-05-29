<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataRt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datart', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_rt');
            $table->integer('id_rw');
            $table->timestamps();
        });
        Schema::create('datarw', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_rw');
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
        Schema::dropIfExists('datart');
        Schema::dropIfExists('datarw');
    }
}

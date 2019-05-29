<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemilihan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemilihan_rt', function (Blueprint $table) {
            $table->increments('id');
            $table->string('signature');
            $table->integer('id_calon_rt');
            $table->timestamps();
        });
        Schema::create('pemilihan_rw', function (Blueprint $table) {
            $table->increments('id');
            $table->string('signature');
            $table->integer('id_calon_rw');
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
        Schema::dropIfExists('pemilihan_rt');
        Schema::dropIfExists('pemilihan_rw');
    }
}

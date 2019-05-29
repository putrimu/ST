<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataCalon extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datacalon_rt', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->text('visi');
            $table->text('misi');
            $table->text('alamat');
            $table->string('foto');
            $table->string('pekerjaan');
            $table->integer('id_rt');
            $table->timestamps();
        });
        Schema::create('datacalon_rw', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nik');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->text('visi');
            $table->text('misi');
            $table->text('alamat');
            $table->string('foto');
            $table->string('pekerjaan');
            $table->integer('id_rw');
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
        Schema::dropIfExists('datacalon_rw');
        Schema::dropIfExists('datacalon_rt');
    }
}

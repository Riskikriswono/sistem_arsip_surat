<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->increments('id_sm');
            $table->string('tanggal',30);
            $table->string('pengirim');
            $table->string('nomorsurat');
            $table->string('perihal');
            $table->string('keterangan');
            $table->string('dokumen');
        });
        Schema::table('surat_masuks', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id_sm');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_masuks');
    }
}

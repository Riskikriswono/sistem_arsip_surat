<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->increments('id_sk');
            $table->string('tanggal',30);
            $table->string('tujuan');
            $table->string('nomorsurat');
            $table->string('perihal');
            $table->string('keterangan');
            $table->string('dokumen');
        });
        Schema::table('surat_keluars', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id_sk');
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
        Schema::dropIfExists('surat_keluars');
    }
}

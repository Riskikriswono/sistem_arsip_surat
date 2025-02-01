<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatapegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapegawais', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nip',18);
            $table->string('nama');
            $table->string('jeniskelamin',15);
            $table->string('nomortelepon',13);
            $table->string('tanggal',30);
            $table->string('jabatan');
            $table->string('dokumen');
            
        });
        Schema::table('datapegawais', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->after('id');
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
        Schema::dropIfExists('datapegawais');
    }
}

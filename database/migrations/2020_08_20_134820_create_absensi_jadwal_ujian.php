<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiJadwalUjian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi_jadwal_ujian', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('jadwal_ujian_id');
            $table->foreign('jadwal_ujian_id')->references('id')->on('jadwal_ujian')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('mahasiswa_id');
            $table->foreign('mahasiswa_id')->references('id')->on('mahasiswa')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->enum('keterangan', ['h', 's', 'i', 'a']);

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
        Schema::dropIfExists('absensi_jadwal_ujian');
    }
}

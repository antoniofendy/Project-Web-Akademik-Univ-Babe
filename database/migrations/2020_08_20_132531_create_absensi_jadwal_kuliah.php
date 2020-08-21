<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsensiJadwalKuliah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi_jadwal_kuliah', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('jadwal_id');
            $table->foreign('jadwal_id')->references('id')->on('jadwal_kuliah')
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
        Schema::dropIfExists('table_absensi_jadwal_kuliah');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalUjian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_ujian', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('matkul_id');
            $table->foreign('matkul_id')->references('id')->on('mata_kuliah')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('kelas_id');
            $table->foreign('kelas_id')->references('id')->on('kelas')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('ruangan_id');
            $table->foreign('ruangan_id')->references('id')->on('ruangan')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->unsignedBigInteger('dosen_id');
            $table->foreign('dosen_id')->references('id')->on('dosen')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->integer('semester');
            $table->boolean('status');

            $table->enum('hari', ['1', '2', '3', '4', '5', '6', '7']);
            $table->time('jam_mulai', 0);
            $table->time('jam_selesai', 0);

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
        Schema::dropIfExists('jadwal_ujian');
    }
}

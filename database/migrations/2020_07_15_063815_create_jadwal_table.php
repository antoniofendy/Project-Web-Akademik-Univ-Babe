<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('matkul_id');
            $table->unsignedBigInteger('ruangan_id');
            $table->unsignedBigInteger('kelas_id');
            $table->unsignedBigInteger('dosen_id');
            $table->string('jam_mulai');
            $table->string('jam_selesai');

            $table->foreign('matkul_id')->references('id')->on('mata_kuliah')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('ruangan_id')->references('id')->on('ruangan')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('kelas_id')->references('id')->on('kelas')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('dosen_id')->references('id')->on('dosen')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal');
    }
}

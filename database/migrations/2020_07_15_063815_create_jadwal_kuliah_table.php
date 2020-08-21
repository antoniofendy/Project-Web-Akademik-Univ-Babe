<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalKuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_kuliah', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('matkul_id');
            $table->unsignedBigInteger('ruangan_id');
            $table->unsignedBigInteger('kelas_id');
            $table->unsignedBigInteger('dosen_id');
            $table->boolean('status');
            //semester untuk mempermudah absensi nantinya
            $table->integer('semester');

            //https://kodingin.com/tipe-data-enum-dan-set-pada-mysql/#:~:text=Perbedaan%20Antara%20tipe%20data%20ENUM,Semoga%20Bermanfaat.
            $table->enum('hari', ['1', '2', '3', '4', '5', '6', '7']);
            $table->time('jam_mulai', 0);
            $table->time('jam_selesai', 0);

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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMataKuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->string('id');
            $table->string('nama_matkul');
            $table->integer('sks_matkul');
            $table->integer('sks_teori');
            $table->integer('sks_praktek');
            $table->string("silabus");
            $table->integer('semester');
            $table->unsignedBigInteger('jurusan_id');
            $table->boolean('status');
            $table->timestamps();

            $table->primary('id');
            $table->foreign('jurusan_id')->references('id')->on('jurusan')
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
        Schema::dropIfExists('mata_kuliah');
    }
}

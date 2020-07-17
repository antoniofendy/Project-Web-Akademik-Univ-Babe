<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNilaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('matkul_id');
            $table->unsignedBigInteger('mhs_id');
            $table->unsignedInteger('tugas');
            $table->unsignedInteger('uts');
            $table->unsignedInteger('uas');
            $table->string('grade');
            $table->timestamps();

            $table->foreign('matkul_id')->references('id')->on('mata_kuliah')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('mhs_id')->references('id')->on('mahasiswa')
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
        Schema::dropIfExists('nilai');
    }
}

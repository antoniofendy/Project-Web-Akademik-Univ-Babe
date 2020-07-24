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
            $table->string('matkul_id');
            $table->unsignedBigInteger('mhs_id');
            $table->unsignedDecimal('tugas');
            $table->unsignedDecimal('uts');
            $table->unsignedDecimal('uas');
            $table->unsignedDecimal('final');
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

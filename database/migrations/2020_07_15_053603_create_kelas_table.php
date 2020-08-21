<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKelasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_kelas');
            
            $table->unsignedBigInteger("angkatan_id");
            $table->foreign("angkatan_id")->references("id")->on("angkatan")
            ->onDelete("cascade")
            ->onUpdate("cascade");

            $table->unsignedBigInteger('jurusan_id')->nullable();
            $table->foreign('jurusan_id')->references('id')->on('jurusan')
            ->onDelete('cascade')
            ->onUpdate('cascade')
            ;

            $table->integer("daya_tampung");
            $table->boolean("status"); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mengajar');
    }
}

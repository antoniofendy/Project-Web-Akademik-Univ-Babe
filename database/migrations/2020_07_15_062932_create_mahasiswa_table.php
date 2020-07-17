<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('jurusan_id');
            $table->unsignedBigInteger('kelas_id');
            $table->string('foto');
            $table->string('alamat');
            $table->string('telepon')->nullable();
            $table->string('hp');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->string('agama');
            $table->string('kewarganegaraan');
            $table->string('nama_ortu');
            $table->string('alamat_ortu');
            $table->string('telepon_ortu');
            $table->string('semester');
            $table->string('shift');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('jurusan_id')->references('id')->on('jurusan')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('kelas_id')->references('id')->on('kelas')
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
        Schema::dropIfExists('mahasiswa');
    }
}

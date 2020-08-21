<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dosen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->enum('agama', ['kristen', 'khatolik', 'islam', 'buddha', 'hindu', 'kong hu chu']);
            $table->enum('jenis_kelamin', ['l', 'p']);
            $table->string('email')->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('kewarganegaraan');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('foto');
            $table->string('telepon');
            $table->string('alamat');
            $table->unsignedBigInteger('jurusan_id');
            $table->string("nik");
            $table->string("gelar");
            $table->string("jenjang_studi");
            $table->enum("jabatan_akademik", ["Assisten Ahli", "Lektor", "Lektor Kepala", "Professor"]);
            $table->string("kota");
            $table->string("provinsi");
            $table->string("kode_pos");
            $table->dateTime("last_login", 0);
            $table->rememberToken();
            $table->timestamps();

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
        Schema::dropIfExists('dosen');
    }
}

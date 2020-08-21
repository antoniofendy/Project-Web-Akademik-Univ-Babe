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
            $table->bigIncrements("id");
            $table->string("name");
            $table->enum("jenis_kelamin", ["l", "p"]);
            $table->string("email")->unique();
            $table->timestamp("email_verified_at");
            $table->string("password");
            $table->unsignedBigInteger("jurusan_id");
            $table->unsignedBigInteger("kelas_id");
            $table->string("foto");
            $table->string("alamat");
            $table->string("telepon");
            $table->string("hp");
            $table->string("tempat_lahir");
            $table->date("tanggal_lahir");
            $table->enum("agama", ["kristen", "khatolik", "islam", "buddha", "hindu", "kong hu chu"]);
            $table->string("kewarganegaraan");
            $table->string("alamat_ortu");
            $table->string("telepon_ortu");
            $table->string("semester");
            $table->enum("shift", ["p", "m"]);
            $table->rememberToken();
            $table->timestamps();

            $table->string("nik")->unique();
            $table->string("golongan_darah");
            $table->enum("status_kawin", ["ya","tidak"]);;
            $table->string("nama_ibu");;
            $table->string("nama_ayah");;
            $table->string("pekerjaan_ibu");;
            $table->string("pekerjaan_ayah");;
            $table->string("penghasilan_ortu");;
            
            $table->string("sekolah_nama");
            $table->string("sekolah_alamat");
            $table->string("sekolah_jurusan");
            $table->string("sekolah_tahun_lulus");
            
            $table->string("kampus_nama");
            $table->string("kampus_alamat");
            $table->string("kampus_jurusan");
            $table->string("kampus_tahun_lulus");

            $table->string("instansi_nama");
            $table->string("instansi_alamat");
            $table->string("instansi_mulai");
            $table->string("instansi_selesai");

            $table->dateTime("last_login", 0);
            $table->string("kode_pos");

            $table->unsignedBigInteger("angkatan_id");
            $table->foreign("angkatan_id")->references("id")->on("angkatan")
            ->onDelete("cascade")
            ->onUpdate("cascade");

            $table->foreign("jurusan_id")->references("id")->on("jurusan")
            ->onDelete("cascade")
            ->onUpdate("cascade");

            $table->foreign("kelas_id")->references("id")->on("kelas")
            ->onDelete("cascade")
            ->onUpdate("cascade");
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

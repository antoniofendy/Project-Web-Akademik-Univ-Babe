<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAngkatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('angkatan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tahun_angkatan');
            $table->integer('semester_angkatan');
            $table->boolean('status');

            $table->string('created_user')->nullable();
            $table->string('updated_user')->nullable();
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
        Schema::dropIfExists('angkatan');
    }
}

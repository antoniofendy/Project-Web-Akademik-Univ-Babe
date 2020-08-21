<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableMataKuliahPrasyarat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mata_kuliah_prasyarat', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('mata_kuliah_id');
            $table->string('mata_kuliah_id_prasyarat');
            $table->enum('bobot_minimal',['A', 'B', 'C', 'D', 'E','F']);
            
            $table->timestamps();

            $table->foreign('mata_kuliah_id')->references('id')->on('mata_kuliah')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('mata_kuliah_id_prasyarat')->references('id')->on('mata_kuliah')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_mata_kuliah_prasyarat');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsUjianSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_ujian_siswa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_ujian')->unsigned();
            $table->bigInteger('id_siswa')->unsigned();
            $table->text('soal')->nullable()->comment('soal ujian');
            $table->timestamp('waktu_mulai')->useCurrent();
            $table->timestamp('waktu_selesai')->nullable();
            $table->text('hasil')->nullable()->comment('hasil ujian');
            $table->double('nilai', 5, 2)->nullable()->default(0.00);
            $table->timestamps();

            $table->foreign('id_ujian')->references('id')->on('rs_ujian')->onDelete('cascade');
            $table->foreign('id_siswa')->references('id')->on('rs_siswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_ujian_siswa');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsUjianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_ujian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_kelas')->unsigned()->nullable();
            $table->bigInteger('id_mapel')->unsigned()->nullable();
            $table->bigInteger('paket_soal_id')->unsigned()->nullable();
            $table->string('nama')->default('text');
            $table->timestamp('waktu_mulai');
            $table->smallInteger('waktu_ujian')->default(60);
            $table->string('token', 50)->nullable()->default('token');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('id_kelas')->references('id')->on('rs_kelas')->onDelete('set null');
            $table->foreign('id_mapel')->references('id')->on('rs_mapel')->onDelete('set null');
            $table->foreign('paket_soal_id')->references('id')->on('rs_paket_soal')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_ujian');
    }
}

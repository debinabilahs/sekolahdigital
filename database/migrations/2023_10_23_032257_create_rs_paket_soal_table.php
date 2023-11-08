<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsPaketSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_paket_soal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_paket', 5)->unique()->nullable()->default('text');
            $table->string('nama');
            $table->string('keterangan')->nullable();
            $table->bigInteger('id_kelas')->unsigned();
            $table->bigInteger('id_mapel')->unsigned();
            $table->timestamps();

            $table->foreign('id_kelas')->references('id')->on('rs_kelas')->onDelete('cascade');
            $table->foreign('id_mapel')->references('id')->on('rs_mapel')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_paket_soal');
    }
}

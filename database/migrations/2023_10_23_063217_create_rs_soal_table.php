<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_soal', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('paket_soal_id')->unsigned()->nullable();
            $table->enum('jenis', ['pilihan_ganda', 'essai']);
            $table->string('nama')->nullable();
            $table->text('soal');
            $table->string('media')->nullable();
            $table->bigInteger('id_kelas')->unsigned();
            $table->bigInteger('id_mapel')->unsigned();
            $table->timestamps();

            $table->foreign('paket_soal_id')->references('id')->on('rs_paket_soal')->onDelete('set null');
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
        Schema::dropIfExists('rs_soal');
    }
}

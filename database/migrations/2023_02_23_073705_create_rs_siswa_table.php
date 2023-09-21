<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsSiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_siswa', function (Blueprint $table) {
            $table->id();
            $table->string('nis');
            $table->string('nisn');
            $table->string('nama_siswa');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email');
            $table->enum('aktif',['Y','N']);
            $table->string('gambar');
            $table->bigInteger('id_level');
            $table->bigInteger('id_kelas');
            $table->bigInteger('id_jurusan');
            $table->bigInteger('id_ruang');
            $table->bigInteger('id_agama');
            $table->bigInteger('id_tp');
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
        Schema::dropIfExists('rs_siswa');
    }
}

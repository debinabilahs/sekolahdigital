<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRkBayarsiswaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rk_bayarsiswa', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('nis');
            $table->string('nama_siswa');
            $table->string('jurusan');
            $table->string('level');
            $table->string('kelas');
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
        Schema::dropIfExists('rk_bayarsiswa');
    }
}

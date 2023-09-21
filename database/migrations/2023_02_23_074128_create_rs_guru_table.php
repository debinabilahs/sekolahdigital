<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsGuruTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_guru', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama_guru');
            $table->bigInteger('no_hp');
            $table->string('email');
            $table->string('tmp_lahir');
            $table->date('tgl_lahir');
            $table->string('username');
            $table->string('password');
            $table->string('foto');
            $table->string('ttd');
            $table->enum('aktif_guru',['Y','N']);
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_guru');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsSekolahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('npsn');
            $table->string('nama_sekolah');
            $table->string('alamat');
            $table->bigInteger('no_telp');
            $table->string('email');
            $table->string('maps');
            $table->string('nama_kepalasekolah');
            $table->string('nip_kepsek');
            $table->string('logo_kepsek');
            $table->enum('aktif_sekolah',['Y','N']);
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
        Schema::dropIfExists('rs_sekolah');
    }
}

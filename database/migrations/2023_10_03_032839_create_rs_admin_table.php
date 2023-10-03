<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_admin', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama_admin');
            $table->string('alamat');
            $table->bigInteger('no_telp');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->string('foto');
            $table->enum('aktif_admin',['Y','N']);
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
        Schema::dropIfExists('rs_admin');
    }
}

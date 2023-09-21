<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRkPembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rk_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_siswa');
            $table->bigInteger('id_pangkal');
            $table->bigInteger('jumlah');
            $table->bigInteger('id_users');
            $table->date('tgl_bayar');
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
        Schema::dropIfExists('rk_pembayaran');
    }
}

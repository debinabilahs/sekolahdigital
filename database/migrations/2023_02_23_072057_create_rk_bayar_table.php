<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRkBayarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rk_bayar', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_siswa');
            $table->bigInteger('id_det');
            $table->bigInteger('jml_bayar');
            $table->bigInteger('id_users');
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
        Schema::dropIfExists('rk_bayar');
    }
}

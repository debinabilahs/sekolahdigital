<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsJadualmengajarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_jadualmengajar', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->bigInteger('id_mapel');
            $table->bigInteger('id_kelas');
            $table->bigInteger('id_guru');
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
        Schema::dropIfExists('rs_jadualmengajar');
    }
}

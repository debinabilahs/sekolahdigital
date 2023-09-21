<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsMapelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_mapel', function (Blueprint $table) {
            $table->id();
            $table->string('nama_mapel');
            $table->string('icon_mapel');
            $table->bigInteger('id_kelas');
            $table->bigInteger('kkm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_mapel');
    }
}

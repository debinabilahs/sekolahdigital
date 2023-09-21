<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetPangkalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_pangkal', function (Blueprint $table) {
            $table->id();
            $table->string('deskripsi');
            $table->bigInteger('jumlah');
            $table->bigInteger('id_tp');
            $table->bigInteger('id_jurusan');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('det_pangkal');
    }
}

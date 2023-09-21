<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekapPangkalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap_pangkal', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_tp');
            $table->bigInteger('id_jurusan');
            $table->string('deskripsi');
            $table->string('jumlah');
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
        Schema::dropIfExists('rekap_pangkal');
    }
}

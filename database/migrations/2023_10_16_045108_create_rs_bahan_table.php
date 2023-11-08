<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsBahanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_bahan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_materi');
            $table->bigInteger('id_mapel');
            $table->bigInteger('id_kelas');
            $table->string('isi');
            $table->string('file');
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
        Schema::dropIfExists('rs_bahan');
    }
}

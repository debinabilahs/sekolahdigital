<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsMateriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_materi', function (Blueprint $table) {
            $table->id();
            $table->string('judul_materi');
            $table->enum('status_materi',['Y','N']);
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('link_youtube');
            $table->string('link_drive');
            $table->string('open_link');
            $table->string('deskripsi');
            $table->bigInteger('id_guru');
            $table->bigInteger('id_kelas');
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
        Schema::dropIfExists('rs_materi');
    }
}

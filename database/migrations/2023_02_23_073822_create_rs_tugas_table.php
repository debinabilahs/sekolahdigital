<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsTugasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_tugas', function (Blueprint $table) {
            $table->id();
            $table->string('judul_tugas');
            $table->enum('status_tugas',['Y','N']);
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->string('link_youtube');
            $table->string('link_drive');
            $table->string('open_link');
            $table->string('deskripsi');
            $table->string('gbr_tugas');
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
        Schema::dropIfExists('rs_tugas');
    }
}

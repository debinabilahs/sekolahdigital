<?php

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsPelanggaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_pelanggaran', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_pelanggaran');
            $table->string('catatan');
            $table->date('tgl_pelanggaran')->nullable();
            $table->bigInteger('id_siswa');
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
        Schema::dropIfExists('rs_pelanggaran');
    }
}

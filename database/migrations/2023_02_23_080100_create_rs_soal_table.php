<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsSoalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_soal', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_exam');
            $table->string('desk_soal');
            $table->string('jawaban');
            $table->bigInteger('id_opsi');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_soal');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsSoalJawabanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_soal_jawaban', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('soal_id')->unsigned();
            $table->text('jawaban')->default('text');
            $table->string('media')->nullable();
            $table->enum('status', ['1', '0'])->default('0');
            $table->timestamps();

            $table->foreign('soal_id')->references('id')->on('rs_soal')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_soal_jawaban');
    }
}

<?php

use Facade\Ignition\Tabs\Tab;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRsOpsiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_opsi', function (Blueprint $table) {
            $table->id();
            $table->string('pil_A');
            $table->string('pil_B');
            $table->string('pil_C');
            $table->string('pil_D');
            $table->string('pil_E');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rs_opsi');
    }
}

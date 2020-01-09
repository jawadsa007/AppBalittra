<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisaPermintaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisa_permintaan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('analisa_id');
            $table->unsignedBigInteger('permintaan_id');
            $table->timestamps();
            $table->foreign('analisa_id')->references('id')->on('analisas');
            $table->foreign('permintaan_id')->references('id')->on('permintaans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analisa_permintaan');
    }
}

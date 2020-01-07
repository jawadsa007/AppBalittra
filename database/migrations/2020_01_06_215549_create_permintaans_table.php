<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pelanggan_id');
            $table->string('judul_penelitian');
            $table->string('jumlah_contoh');
            $table->string('asal_contoh');
            $table->tinyInteger('status_proses')->default('0');
            $table->tinyInteger('status_bayar')->default('0');
            $table->timestamps();
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permintaans');
    }
}

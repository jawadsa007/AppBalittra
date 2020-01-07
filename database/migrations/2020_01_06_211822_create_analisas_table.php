<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analisas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_analisa');
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->integer('harga');
            $table->timestamps();
            $table->foreign('kategori_id')->references('id')->on('kategoris');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('analisas');
    }
}

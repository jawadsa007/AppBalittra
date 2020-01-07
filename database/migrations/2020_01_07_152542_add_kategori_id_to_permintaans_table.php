<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddKategoriIdToPermintaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('permintaans', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('kategori_id')->after('judul_penelitian');
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
        Schema::table('permintaans', function (Blueprint $table) {
            //
        });
    }
}

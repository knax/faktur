<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePembelian extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->boolean('sudah_dibayar');
            $table->integer('id_pelanggan')->unsigned();
            $table->foreign('id_pelanggan')->references('id')->on('pelanggan');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pembelian');
    }

}

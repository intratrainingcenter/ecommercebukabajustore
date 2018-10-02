<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_promos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('foto');
            $table->string('lokasifoto');
            $table->string('kode_promo');
            $table->string('nama_promo');
            $table->integer('diskon');
            $table->date('berlaku_awal');
            $table->date('berlaku_akhir');
            $table->integer('min_pembelian');
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
        Schema::dropIfExists('promos');
    }
}

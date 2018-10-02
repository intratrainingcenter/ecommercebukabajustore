<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_pemesanan');
            $table->string('kode_promo')->nullable();
            $table->string('kode_user');
            $table->date('tgl_pemesanan');
            $table->integer('grandtotal');
            $table->integer('dibayar');
            $table->text('keterangan');
            $table->string('kode_ongkir');
            $table->string('status');
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
        Schema::dropIfExists('pemesanans');
    }
}

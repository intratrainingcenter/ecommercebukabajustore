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
            $table->date('tgl_diterima')->nullable();
            $table->float('grandtotal');
            $table->float('diskon');
            $table->float('dibayar');
            $table->text('keterangan')->nullable();
            $table->text('alamat');
            $table->string('kode_ongkir');
            $table->enum('status',['pending','paid','process','delivery','received','cancel']);
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

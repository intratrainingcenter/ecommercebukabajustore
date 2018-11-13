<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpsiPemesananTempsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opsi_pemesanan_temps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_pemesanan');
            $table->string('kode_barang');
            $table->integer('qty');
            $table->float('harga');
            $table->text('keterangan')->nullable();
            $table->float('subtotal');
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
        Schema::dropIfExists('opsi_pemesanan_temps');
    }
}

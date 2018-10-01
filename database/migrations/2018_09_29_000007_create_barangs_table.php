<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('foto');
            $table->string('kode_kategori');
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->integer('berat_barang');
            $table->integer('hpp');
            $table->integer('harga_jual');
            $table->integer('stok');
            $table->text('deskripsi');
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
        Schema::dropIfExists('barangs');
    }
}

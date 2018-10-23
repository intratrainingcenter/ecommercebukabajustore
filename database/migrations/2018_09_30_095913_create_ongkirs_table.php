<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOngkirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ongkirs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_ongkir');
            $table->string('kurir');
            $table->string('no_resi')->nullable();
            $table->string('jenis_layanan');
            $table->string('jangka_pengiriman');
            $table->integer('tarif');
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
        Schema::dropIfExists('ongkirs');
    }
}

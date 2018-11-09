<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_settings', function (Blueprint $table) {
           $table->increments('id');
           $table->string('foto')->nullable();
           $table->string('lokasifoto')->nullable();
           $table->string('nama_web');
           $table->string('id_kota');
           $table->string('alamat');
           $table->string('no_telp');
           $table->string('email');
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
        Schema::dropIfExists('settings');
    }
}

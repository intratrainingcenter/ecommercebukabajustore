<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpsiChatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('opsi_chats', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_chat');
            $table->string('kode_pembalas');
            $table->text('isi_chat');
            $table->date('tgl_chat');
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
        Schema::dropIfExists('opsi_chats');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_user');
            $table->string('avatar');
            $table->string('avatar_original')->nullable();
            $table->string('lokasifoto');
            $table->string('provider_id')->nullable();
            $table->string('provider')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('kode_jabatan')->nullable();
            $table->string('alamat');
            $table->string('no_telp');
            $table->string('jenis_kelamin');
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();
            // $table->timestamp('email_verified_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

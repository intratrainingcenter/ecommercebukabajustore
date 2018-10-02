<?php

use Illuminate\Database\Seeder;

class Chat_Cs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('master_chat_cs')->insert([
         'kode_chat' => 'CHT-1',
         'kode_customer' => '2',
         'kode_cs' => '1',
         'status' => 'aktif',
     ]);
    }
}

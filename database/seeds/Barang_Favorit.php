<?php

use Illuminate\Database\Seeder;

class Barang_Favorit extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('barang_favorits')->insert([
         'kode_user' => '1',
         'kode_barang' => 'BR-1',
     ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class Foto_Barang extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('foto_barangs')->insert([
         'kode_barang' => 'BR-1',
         'foto' => 'kosong',
     ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class Ongkir extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('ongkirs')->insert([
         'kode_ongkir' => '1',
         'kurir' => 'jne',
         'jenis_layanan' => 'express',
         'tarif' => '10000',
         'tgl_diterima' => date('Y-m-d'),
     ]);
    }
}

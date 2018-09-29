<?php

use Illuminate\Database\Seeder;

class Opsi_Retur extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('opsi_returs')->insert([
         'kode_retur' => 'RT-1',
         'kode_barang' => 'BR-1',
         'qty' => '1',
         'harga' => '15000',
         'subtotal' => '15000',
     ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class Opsi_Pemesanan_Temp extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('opsi_pemesanan_temps')->insert([
         'kode_pemesanan' => 'TR-1',
         'kode_barang' => 'BR-1',
         'qty' => '1',
         'harga' => '15000',
         'subtotal' => '15000',
     ]);
    }
}

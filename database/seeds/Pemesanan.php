<?php

use Illuminate\Database\Seeder;

class Pemesanan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('pemesanans')->insert([
         'kode_pemesanan' => 'TR-1',
         'kode_promo' => '',
         'kode_user' => '2',
         'tgl_pemesanan' => date('Y-m-d'),
         'grandtotal' => '15000',
         'dibayar' => '20000',
         'keterangan' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
         'kode_ongkir' => '1',
         'status' => 'process',
         'diskon' => '1.1',
         'alamat' => 'MLG',
     ]);
    }
}

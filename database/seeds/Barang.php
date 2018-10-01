<?php

use Illuminate\Database\Seeder;

class Barang extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('master_barangs')->insert([
         'foto' => 'kosong',
         'kode_kategori' => 'KT-1',
         'kode_barang' => 'BR-1',
         'nama_barang' => 'Barang 1',
         'berat_barang' => '60',
         'hpp' => '10000',
         'harga_jual' => '15000',
         'stok' => '10',
         'deskripsi' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
     ]);
    }
}

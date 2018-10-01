<?php

use Illuminate\Database\Seeder;

class Kategori extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('master_kategoris')->insert([
         'kode_kategori' => 'KT-1',
         'nama_kategori' => 'T-shirt',
     ]);
    }
}

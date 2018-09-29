<?php

use Illuminate\Database\Seeder;

class Promo extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('master_promos')->insert([
         'foto' => 'kosong',
         'kode_promo' => 'weekendpromo',
         'nama_promo' => 'promo weekend',
         'diskon' => '50',
     ]);
    }
}

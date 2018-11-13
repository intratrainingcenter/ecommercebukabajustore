<?php

use Illuminate\Database\Seeder;

class Jabatan extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('master_jabatans')->insert([
        [
         'kode_jabatan' => 'admin',
         'nama_jabatan' => 'Admin',
       ],
       [
         'kode_jabatan' => 'member',
         'nama_jabatan' => 'Member'
       ],
       [
         'kode_jabatan' => 'spv',
         'nama_jabatan' => 'Spv'
       ]
     ]);
    }
  }

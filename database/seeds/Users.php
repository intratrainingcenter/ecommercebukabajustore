<?php

use Illuminate\Database\Seeder;

class Users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('master_users')->insert([ [
         'kode_user' => '1',
         'foto' => 'kosong',
         'username' => 'admin',
         'email' => 'admin@gmail.com',
         'password' => bcrypt('admin'),
         'kode_jabatan' => 'admin',
         'alamat' => 'kedoya',
         'no_telp' => '09213',
         'jenis_kelamin' => 'laki-laki',
         'status' => 'aktif',
     ],[
       'kode_user' => '2',
       'foto' => 'kosong',
       'username' => 'member',
       'email' => 'member@gmail.com',
       'password' => bcrypt('member'),
       'kode_jabatan' => 'member',
       'alamat' => 'kedoya',
       'no_telp' => '09213',
       'jenis_kelamin' => 'laki-laki',
       'status' => 'aktif',
   ],[
       'kode_user' => '3',
      'foto' => 'kosong',
      'username' => 'spv',
      'email' => 'spv@gmail.com',
      'password' => bcrypt('spv'),
      'kode_jabatan' => 'spv',
      'alamat' => 'kedoya',
      'no_telp' => '09213',
      'jenis_kelamin' => 'laki-laki',
      'status' => 'aktif',
  ]
      ]);
    }
}

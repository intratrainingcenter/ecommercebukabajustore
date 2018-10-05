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
      DB::table('users')->insert([ [
         'kode_user' => '1',
         'avatar' => 'http://www.haipic.com/icon/12247/12247.png',
         'avatar_original' => 'http://www.haipic.com/icon/12247/12247.png',
         'lokasifoto' => 'kosong',
         'provider_id' => '',
         'provider' => '',
         'name' => 'admin',
         'email' => 'admin@gmail.com',
         'password' => bcrypt('admin'),
         'kode_jabatan' => 'admin',
         'alamat' => 'kedoya',
         'no_telp' => '09213',
         'jenis_kelamin' => 'laki-laki',
         'status' => 'Active',
     ]
      ]);
    }
}

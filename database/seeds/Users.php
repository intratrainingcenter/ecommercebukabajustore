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
         'kode_user' => '2',
         'avatar' => '',
         'avatar_original' => '',
         'lokasifoto' => 'kosong',
         'provider_id' => '',
         'provider' => '',
         'name' => 'var',
         'email' => 'varvar@gmail.com',
         'password' => bcrypt('asdasd'),
         'kode_jabatan' => 'member',
         'alamat' => 'kedoya',
         'no_telp' => '09213',
         'jenis_kelamin' => 'laki-laki',
         'status' => 'Active',
     ]
      ]);
    }
}

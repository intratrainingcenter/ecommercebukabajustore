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
         'avatar' => 'http://www.haipic.com/icon/12247/12247.png',
         'avatar_original' => 'http://www.haipic.com/icon/12247/12247.png',
         'lokasifoto' => 'kosong',
         'lokasifoto_original' => 'kosong',
         'provider_id' => '',
         'provider' => '',
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
       'avatar' => 'http://www.dicomtech.com.pe/img/servicios-profesionales-outsourcing/servicios-profesionales-outsourcing-cio-services-descripcion.png',
       'avatar_original' => 'http://www.dicomtech.com.pe/img/servicios-profesionales-outsourcing/servicios-profesionales-outsourcing-cio-services-descripcion.png',
       'lokasifoto' => 'kosong',
       'lokasifoto_original' => 'kosong',
       'provider_id' => '',
       'provider' => '',
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
       'avatar' => 'http://www.clker.com/cliparts/7/9/2/e/13704027641946237223business_user_process-1.png',
       'avatar_original' => 'http://www.clker.com/cliparts/7/9/2/e/13704027641946237223business_user_process-1.png',
       'lokasifoto' => 'kosong',
       'lokasifoto_original' => 'kosong',
       'provider_id' => '',
       'provider' => '',
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

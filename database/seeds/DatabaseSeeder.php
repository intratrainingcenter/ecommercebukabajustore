<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      // $this->call(Slider::class);
      // $this->call(Story::class);
      // $this->call(About::class);
      $this->call(Jabatan::class);
      $this->call(Users::class);
      // $this->call(Promo::class);
      $this->call(Barang::class);
      // $this->call(Barang_Favorit::class);
      // $this->call(Foto_Barang::class);
      $this->call(Kategori::class);
      // $this->call(Setting::class);
      // $this->call(Chat_Cs::class);
      // $this->call(Opsi_Chat::class);
      $this->call(Pemesanan::class);
      $this->call(Opsi_Pemesanan_Temp::class);
      $this->call(Opsi_Pemesanan::class);
      // $this->call(Retur::class);
      // $this->call(Opsi_Retur::class);
      $this->call(Ulasan::class);
      // $this->call(Ongkir::class);
      // $this->call(Contact::class);
    }
}

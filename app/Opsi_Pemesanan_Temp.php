<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opsi_Pemesanan_Temp extends Model
{
    protected $table = 'opsi_pemesanan_temps';
    protected $fillable = ['kode_pemesanan','kode_barang','qty','harga','subtotal'];

    public function detailProduct()
	{
		return $this->belongsTo('App\Barang','kode_barang','kode_barang');
	}
}

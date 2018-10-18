<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opsi_Pemesanan extends Model
{
    protected $table = 'opsi_pemesanans';
    protected $fillable = ['kode_pemesanan','kode_barang','qty','harga','subtotal','keterangan'];

    public function detailProduct()
	{
		return $this->belongsTo('App\Barang','kode_barang','kode_barang');
	}
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanans';
    protected $fillable = ['kode_pemesanan','kode_promo','kode_user','tgl_pemesanan','tgl_diterima','grandtotal','dibayar','keterangan','alamat','kode_ongkir','status',''];

    public function shippingService()
	{
		return $this->belongsTo('App\ongkir','kode_ongkir','kode_ongkir');
	}

	public function detailPromo()
	{
		return $this->belongsTo('App\Promo','kode_promo','kode_promo');
	}

	public function opsiDetailHistory()
	{
		return $this->hasMany('App\Opsi_Pemesanan','kode_pemesanan','kode_pemesanan');
	}
}

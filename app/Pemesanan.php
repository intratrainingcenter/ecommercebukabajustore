<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanans';
    protected $fillable = ['kode_pemesanan','kode_promo','kode_user','tgl_pemesanan','tgl_diterima','grandtotal','diskon','dibayar','keterangan','alamat','kode_ongkir','status'];

    public function detailUser()
	{
		return $this->belongsTo('App\User','kode_user','kode_user');
	}

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

  public function Return()
  {
    return $this->belongsTo('App\Retur','kode_pemesanan','kode_pemesanan');
  }

  public function opsi_transaction()
  {
    return $this->hasMany('App\Opsi_Pemesanan','kode_pemesanan','kode_pemesanan');
  }
}

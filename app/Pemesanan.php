<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    protected $table = 'pemesanans';
    protected $fillable = ['kode_pemesanan','kode_promo','kode_user','tgl_pemesanan','tgl_diterima','grandtotal','dibayar','keterangan','alamat','kode_ongkir','status',''];
}

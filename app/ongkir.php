<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ongkir extends Model
{
    protected $table = 'ongkirs';
    protected $fillable = ['kode_ongkir','kurir','jenis_layanan','jangka_pengiriman','tarif'];
}

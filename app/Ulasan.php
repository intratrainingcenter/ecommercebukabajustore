<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    protected $table = 'ulasans';
    protected $fillable = ['kode_pemesanan','kode_user','kode_barang','isi_ulasan','rating','status'];
}

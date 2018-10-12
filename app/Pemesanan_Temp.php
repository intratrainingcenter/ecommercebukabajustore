<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemesanan_Temp extends Model
{
    protected $table = 'pemesanan_temps';
    protected $fillable = ['kode_user','kode_pemesanan','status'];
}

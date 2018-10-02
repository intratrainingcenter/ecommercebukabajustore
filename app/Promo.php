<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $table = 'master_promos';
    protected $fillable = ['foto','lokasifoto','kode_promo','nama_promo','diskon','min_pembelian','berlaku_awal','berlaku_akhir'];
}

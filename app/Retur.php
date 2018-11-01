<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
  protected $table = 'returs';
  protected $fillable = ['kode_retur','kode_pemesanan','kode_user','keterangan','tgl_retur','grandtotal','cashback','status'];

  public function opsiDetailreturn()
  {
    return $this->hasMany('App\Opsi_Retur','kode_retur','kode_retur');
  }

  public function userMember()
  {
    return $this->belongsTo('App\User','kode_user','kode_user');
  }
}

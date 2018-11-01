<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Opsi_Retur extends Model
{
  protected $table = 'opsi_returs';
  protected $fillable = ['kode_retur','kode_barang','kode_user','keterangan','qty','harga','subtotal'];

    public function detailProductreturn()
  {
    return $this->belongsTo('App\Barang','kode_barang','kode_barang');
  }
}

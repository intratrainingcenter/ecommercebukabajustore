<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ulasan extends Model
{
    public function relationproduct()
    {
      return $this->belongsTo('App\Barang','kode_barang','kode_barang');
    }
    public function relationuser()
    {
      return $this->belongsTo('App\User','kode_user','kode_user');
    }
}

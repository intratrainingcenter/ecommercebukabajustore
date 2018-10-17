<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang_Favorit extends Model
{
    protected $table = 'barang_favorits';

    public function product()
  	{
  		return $this->belongsTo('App\Barang','kode_barang','kode_barang');
  	}

}

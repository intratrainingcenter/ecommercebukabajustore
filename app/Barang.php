<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
     protected $table = 'master_barangs';

     public function category()
        {
        return $this->belongsTo('App\Kategori','kode_kategori','kode_kategori');
        }
}

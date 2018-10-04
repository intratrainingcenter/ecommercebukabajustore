<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
     protected $table = 'master_barangs';
     protected $primaryKey = 'kode_barang';
}

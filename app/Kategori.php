<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table ='master_kategoris';
    protected $fillable =['kode_kategori','nama_kategori','foto_kategori','lokasifoto'];
}

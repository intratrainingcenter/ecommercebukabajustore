<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'master_jabatans';
    protected $fillable = ['kode_jabatan','nama_jabatan'];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
  protected $table ='master_abouts';
  protected $fillable =['foto','judul','lokasifoto','deskripsi','status'];
}

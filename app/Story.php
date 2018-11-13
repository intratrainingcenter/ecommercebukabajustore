<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $table = 'master_storys';
    protected $fillable = ['created_by','foto','lokasifoto','judul','deskripsi','status'];
}

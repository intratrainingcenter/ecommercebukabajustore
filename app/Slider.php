<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'master_sliders';
    protected $fillable = ['created_by','foto','lokasifoto','deskripsi','status'];
}

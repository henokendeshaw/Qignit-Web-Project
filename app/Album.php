<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['Album_Name','Artist_Name', 'Producer', 'Releas_Date', 'Gener', 'Sort', 'Price'];
}

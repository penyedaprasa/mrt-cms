<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
    protected $fillable = ['name', 'description', 'image', 'latitude', 'longitude', 'time_open', 'time_close', 'nomor', 'lanes','status'];
}

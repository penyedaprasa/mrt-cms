<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    protected $fillable = ['name', 'train_code', 'image', 'description', 'train_type', 'speed','speed_unit', 'enabled'];
}

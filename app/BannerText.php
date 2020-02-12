<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerText extends Model
{
    protected $fillable = ['banner', 'valid_until'];
}

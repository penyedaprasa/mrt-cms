<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = ['name', 'description', 'image', 'source', 'destination', 'distance', 'time_est'];

    public function stationSource()
    {
        return $this->belongsTo(Station::class, 'source');
    }

    public function stationDestination()
    {
        return $this->belongsTo(Station::class, 'destination');
    }
}

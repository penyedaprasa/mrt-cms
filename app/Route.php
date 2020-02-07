<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $fillable = ['name', 'description', 'image', 'source', 'destination', 'distance', 'time_est'];

    public function stationSource()
    {
        return $this->belongsTo('App\Station','source');
    }

    public function stationDestination()
    {
        return $this->belongsTo('App\Station','destination');
    }
}

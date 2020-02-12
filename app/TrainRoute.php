<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainRoute extends Model
{
    protected $fillable = ['train_id', 'route_id', 'arrival', 'departure'];

    public function route(){
        return $this->belongsTo(Route::class, 'route_id');
    }

    public function train(){
        return $this->belongsTo(Train::class, 'train_id');
    }
}

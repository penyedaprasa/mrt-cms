<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    protected $table = 'v_dashboard';
    protected $fillable = ['digital_id', 'digital_id_stations', 'stations_id', 
        'stations_name', 'stations_desc', 'stations_image', 'stations_latitude', 
        'stations_longitude', 'stations_t_buka','stations_t_tutup', 
        'stations_lanes', 'stations_nomor', 'stations_status', 'digital_created_at', 'diff', 
        'digital_status', 'digital_hit_now'
    ];
}

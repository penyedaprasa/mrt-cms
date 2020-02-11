<?php

namespace App\Http\Controllers\API;

use App\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function index(){
        $stations = Station::all();
        $msg = array('status'=>true,'message'=>'Get All Station','stations'=>$stations);
        return response()->json($msg);
    }
}

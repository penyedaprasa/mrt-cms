<?php

namespace App\Http\Controllers\API;

use App\Holiday;
class HolidayController extends Controller {
    public function index(){
        $holidays = Holiday::orderBy('holi_date','ASC')->get();
        $msg = array('status'=>true,'message'=>'Data Hari Libur','holidays'=>$holidays);
        return response()->json($msg);
    }
}
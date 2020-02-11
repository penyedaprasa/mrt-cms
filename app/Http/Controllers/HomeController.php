<?php

namespace App\Http\Controllers;

use App\Train;
use App\Station;
use App\TrainSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $stations = Station::all();
        return view('landing',compact('stations'));
    }
    public function schedule(Request $request,$id)
    {
        $station = Station::find($id);
        $train = Train::find(1);
        $schedule = DB::table('v_train_schedule_routes')->where('destination',$id)->where('train_id',$train->id)->first();
        if(!empty($schedule)){
            $fromstation = Station::find($schedule->station_id);
        } else {
            $fromstation='';
        }
        
        return view('schedule',compact('station','schedule','fromstation','train'));
    }
}

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
        $source = Station::find($id);
        $train = Train::find(1);
        $destinations = DB::table('v_source_destinations')->where('station_id',$id)
        ->get();
        
        
        return view('schedule',compact('source','destinations','train'));
    }
}

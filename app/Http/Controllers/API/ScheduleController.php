<?php
namespace App\Http\Controllers\API;

use App\TrainSchedule;
use App\Train;
use App\Station;
use Illuminate\Support\Facades\DB;

class ScheduleController extends Controller {
    public function index($id){
        $station = Station::find($id);
        $dests = DB::table('v_source_destinations')->where('station_id',$id)->get();
        
        $destinations = array();
        foreach($dests as $dest){
            $schedules = TrainSchedule::where('station_id',$dest->station_id)
            ->where('destination',$dest->destination)
            ->orderBy('departure_hour','ASC')->get();
            $destinations[]=array('destination'=>$dest,
                'schedules'=>$schedules);
        }
        $msg = array('status'=>true,'message'=>'Mengambil jadwal sukses!',
            'station'=>$station,
            'lanes'=>$destinations);
        
        return response()->json($msg);
    }
    public function hours($station,$hour){
        $schedules = TrainSchedule::where('destination',$station)
        ->where('departure_hour',$hour)->get();

        $msg = array('status'=>true,'message'=>'Mengambil jadwal sukses!','schedule'=>$schedules);

        return response()->json($msg);
    }
}
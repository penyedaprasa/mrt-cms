<?php

namespace App\Http\Controllers;

use App\Train;
use App\Station;
use App\TrainSchedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trains = Train::all();

        return view('schedule.index',compact('trains'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $train=Train::find($id);
        $stations = Station::orderBy('nomor','ASC')->get();
        
        return view('schedule.create',compact('train','stations'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->all()){
            if(!empty($request->id)){
                $train_schedules = TrainSchedule::find($request->id);
            } else {
                $train_schedules = new TrainSchedule();
                $train_schedules->train_id = $request->train_id;
                $train_schedules->station_id = $request->source;
                $train_schedules->destination = $request->destination;
                $train_schedules->departure_hour = $request->departure_hour;
                $train_schedules->dep_hday_hour = $request->dep_hday_hour;
            }
            
            $train_schedules->departure_minute = $request->departure_minute;
            $train_schedules->dep_hday_minute = $request->dep_hday_minute;
            $train_schedules->status = $request->status;
            $train_schedules->save();
            $msg = array('status'=>true,'message'=>'Menambahkan jadwal sukses!',
            'schedule'=>$train_schedules);
        } else {
            $msg = array('status'=>false,'message'=>'Menambahkan jadwal gagal!');
        }
        
        return response()->json($msg)->setEncodingOptions(JSON_NUMERIC_CHECK);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TrainSchedule  $trainSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(TrainSchedule $trainSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TrainSchedule  $trainSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainSchedule $trainSchedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrainSchedule  $trainSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $train=Train::find($request->trainid);
        $source = Station::find($request->source);
        $destination = Station::find($request->destination);
        // $schedules = TrainSchedule::where('station_id',$source->id)->get();
        $opens = explode(":",$source->time_open);
        $closes = explode(":",$source->time_close);
        $open = $opens[0];
        $close = $closes[0];
        $maxcol=12;
        return view('schedule.update',compact('source','destination','train','open','close','maxcol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrainSchedule  $trainSchedule
     * @return \Illuminate\Http\Response
     */
    public function remove($train,$station,$hour)
    {
        if(!empty($train) && !empty($station) && !empty($hour)){
            $schedule = TrainSchedule::where('train_id',$train)
            ->where('destination',$station)
            ->where('departure_hour',$hour)->get();
            if(!empty($schedule)){
                DB::table('train_schedules')
                ->where('train_id',$train)
                ->where('destination',$station)
                ->where('departure_hour',$hour)->delete();
                $msg = array('status'=>true,'message'=>'Menghapus jadwal sukses!');
            } else {
                $msg = array('status'=>false,'message'=>'Jadwal Tidak Ada!');    
            }
        } else {
            $msg = array('status'=>false,'message'=>'Menambahkan jadwal gagal!');
        }
        return response()->json($msg)->setEncodingOptions(JSON_NUMERIC_CHECK);
    }
    public function delete($id){
        if(!empty($id)){
            $schedule = TrainSchedule::find($id);
            $schedule->delete();
            $msg = array('status'=>true,'message'=>'Menghapus Jadwal Sukses!');    
        } else {
            $msg = array('status'=>false,'message'=>'Jadwal Tidak Ada!');    
        }
        return response()->json($msg)->setEncodingOptions(JSON_NUMERIC_CHECK);

    }
}

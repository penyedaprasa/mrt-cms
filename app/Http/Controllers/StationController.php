<?php

namespace App\Http\Controllers;

use App\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stations = Station::all();
        return view('station.index',compact('stations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('station.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $stations = Station::where('name',$request->name)->first();
        if(empty($stations)){
            $stations = new Station();
            $stations->name = $request->name;
        }
        
        $stations->description = $request->description;
        if($request->file('image')){
            $path = $request->file('image')->store('public/images');
            $filename='images/'.basename($path);
            $stations->image=$filename;                
        } 
        $stations->latitude = $request->latitude;
        $stations->longitude = $request->longitude;
        $stations->time_open = $request->time_open;
        $stations->time_close = $request->time_close;
        $stations->status = $request->status;
        
        $stations->save();
        return redirect('dashboard/station');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function show(Station $station)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $station=Station::findOrFail($id);
        return view('station.edit',compact('station'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Station $station)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Station  $station
     * @return \Illuminate\Http\Response
     */
    public function destroy(Station $station)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $holidays = Holiday::orderBy('holi_date','ASC')->get();
        return view('holiday.index',compact('holidays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = array('nasional','cuti bersama','hari besar agama');
        return view('holiday.create',compact('jenis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!empty($request->id)){
            $holidays = Holiday::find($request->id);
        } else {
            $holidays = new Holiday();
        }
        
        $holidays->title = $request->title;
        $holidays->jenis = $request->jenis;
        $holidays->holi_date = $request->holi_date;
        $holidays->enabled = $request->enabled;
        
        $holidays->save();
        return redirect('dashboard/holiday');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function show(Holiday $holiday)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $holiday=Holiday::find($id);
        $jenis = array('nasional','cuti bersama','hari besar agama');
        return view('holiday.edit',compact('holiday','jenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Holiday $holiday)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        if(!empty($id)){
            $holiday = Holiday::find($id);
            $holiday->delete();

        }
        return redirect('dashboard/holiday');
    }
}

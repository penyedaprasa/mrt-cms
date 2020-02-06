<?php

namespace App\Http\Controllers;

use App\TrainRoute;
use Illuminate\Http\Request;

class TrainRouteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $train_routes = TrainRoute::all();
      return view('trainroute.index',compact('train_routes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('trainroute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $train_routes = new TrainRoute();
        $train_routes->train_id = $request->train_id;
        $train_routes->route_id = $request->route_id;
        $train_routes->arrival = $request->arrival;
        $train_routes->departure = $request->departure;
        
        $train_routes->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TrainRoute  $trainRoute
     * @return \Illuminate\Http\Response
     */
    public function show(TrainRoute $trainRoute)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TrainRoute  $trainRoute
     * @return \Illuminate\Http\Response
     */
    public function edit(TrainRoute $trainRoute)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TrainRoute  $trainRoute
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TrainRoute $trainRoute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TrainRoute  $trainRoute
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrainRoute $trainRoute)
    {
        //
    }
}

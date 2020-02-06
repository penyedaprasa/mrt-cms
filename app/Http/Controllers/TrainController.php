<?php

namespace App\Http\Controllers;

use App\Train;
use Illuminate\Http\Request;
use App\Helpers\General;
use Illuminate\Support\Facades\View;
use Yajra\Datatables\Datatables;

class TrainController extends Controller
{
    private $title;
    private $model;
    private $view;
    private $main_model;

    public function __construct(Train $main_model)
    {
        $this->title        = "Train Management";
        $this->model        = "Train";
        $this->view         = "train";
        $this->main_model   = $main_model;

        View::share('title', $this->title);
        View::share('model', $this->model);
        View::share('view', $this->view);
        View::share('main_model', $this->main_model);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $columns = [
            'train_code',
            'name',
            'train_type',
            'speed',
            'speed_unit',
            'status',
            'action'
        ];

        if ($request->ajax()) {
            $datas = $this->main_model->select(["*"]);
            return Datatables::of($datas)
                ->addColumn('action', function ($data) {
                    return view($this->view . '.action', compact('data'));
                })
                ->escapeColumns(['actions'])
                ->make(true);
        }
        return view($this->view . '.index')
            ->with(compact('columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('train.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trains = new Train();
        $trains->name = $request->name;
        $trains->train_code = $request->train_code;
        $trains->image = $request->image;
        $trains->description = $request->description;
        $trains->train_type = $request->train_type;
        $trains->speed = $request->speed;
        $trains->speed_unit = $request->speed_unit;
        $trains->current_lat = $request->current_lat;
        $trains->current_lng = $request->current_lng;
        $trains->status = $request->status;
        $trains->heading_to = $request->heading_to;
        $trains->enabled = $request->enabled;
        $trains->created_at = $request->created_at;
        $trains->updated_at = $request->updated_at;
        $trains->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Train  $train
     * @return \Illuminate\Http\Response
     */
    public function show(Train $train)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Train  $train
     * @return \Illuminate\Http\Response
     */
    public function edit(Train $train)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Train  $train
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Train $train)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Train  $train
     * @return \Illuminate\Http\Response
     */
    public function destroy(Train $train)
    {
        //
    }
}

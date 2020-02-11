<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\TrainRouteRequest;

use App\Route;
use App\Train;
use App\TrainRoute;

use App\Helpers\General;
use Illuminate\Support\Facades\DB;
use JsValidator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

class TrainRouteController extends Controller
{
    private $title;
    private $model;
    private $view;
    private $main_model;

    public function __construct(TrainRoute $main_model)
    {
        $this->title        = "Train Route Management";
        $this->model        = "TrainRoute";
        $this->view         = "trainroute";
        $this->main_model   = $main_model;
        $this->validate     = 'TrainRouteRequest';
        $listTrains         = Train::select('id', 'name')->get();
        $listRoutes         = Route::select('id','name')->get();

        View::share('title', $this->title);
        View::share('model', $this->model);
        View::share('view', $this->view);
        View::share('main_model', $this->main_model);
        View::share('listTrains', $listTrains);
        View::share('listRoutes', $listRoutes);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $columns = ['route.name', 'train.name', 'arrival', 'departure', 'action'];
        if ($request->ajax()) {
            $datas = $this->main_model->with(['route', 'train'])->select(['*']);;
            return Datatables::of($datas)
                ->addColumn('action', function ($data) {
                    return view($this->view . '.action', compact('data'));
                })
                ->editColumn('route.name', function ($data) {
                    return $data->route->name;
                })
                ->editColumn('train.name', function ($data) {
                    return $data->train->name;
                })
                ->escapeColumns(['action'])
                ->make(true);
        }
        return view($this->view . '.index')
            ->with(compact('datas', 'columns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validator = JsValidator::formRequest('App\Http\Requests\\' . $this->validate);
        return view($this->view . '.create')->with(compact('validator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TrainRouteRequest $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        try {
            if ($request->file('image')) {
                $path = $request->file('image')->store('public/images');
                $filename = 'images/' . basename($path);
                $input['image'] = $filename;
            }
            $data = $this->main_model->create($input);
            DB::commit();
            toast()->success('Data berhasil input', $this->title);
            return redirect()->route($this->view . '.index');
        } catch (\Exception $e) {
            DB::rollback();
            toast()->error('Terjadi Kesalahan' . $e->getMessage(), $this->title);
        }
        return redirect()->back();
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
    public function edit($id)
    {
        $data = $this->main_model->findOrFail($id);
        $validator = JsValidator::formRequest('App\Http\Requests\\' . $this->validate);
        return view($this->view . '.edit')->with(compact('validator', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Train  $train
     * @return \Illuminate\Http\Response
     */
    public function update(TrainRouteRequest $request, $id)
    {
        $input = $request->all();
        // dd($input);
        $data = $this->main_model->findOrFail($id);
        DB::beginTransaction();
        try {
            if ($request->file('image')) {
                $path = $request->file('image')->store('public/images');
                $filename = 'images/' . basename($path);
                $input['image'] = $filename;
            }
            $data->fill($input)->save();
            DB::commit();
            toast()->success('Data berhasil input', $this->title);
            return redirect()->route($this->view . '.index');
        } catch (\Exception $e) {
            toast()->error('Terjadi Kesalahan' . $e->getMessage(), $this->title);
            DB::rollback();
        }
        return redirect()->back();
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Train  $train
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->main_model->findOrFail($id);
        DB::beginTransaction();
        try {
            if ($data->image != null) {
                Storage::delete('/public/' . $data->image);
            }
            $data->delete();
            DB::commit();
            toast()->success('Data berhasil di hapus', $this->title);
            return redirect()->route($this->view . '.index');
        } catch (\Exception $e) {
            DB::rollback();
        }
        toast()->error('Terjadi Kesalahan', $this->title);
        return redirect()->back();
    }
}

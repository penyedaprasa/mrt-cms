<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\HolidayRequest;

use App\Holiday;

use App\Helpers\General;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use JsValidator;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

class HolidayController extends Controller
{
    private $title;
    private $model;
    private $view;
    private $main_model;

    public function __construct(Holiday $main_model)
    {
        $this->title        = "Holiday Management";
        $this->model        = "Holiday";
        $this->view         = "holiday";
        $this->main_model   = $main_model;
        $this->validate     = 'HolidayRequest';
        $jenis = ['nasional', 'cuti bersama', 'hari besar agama'];

        View::share('title', $this->title);
        View::share('model', $this->model);
        View::share('view', $this->view);
        View::share('main_model', $this->main_model);
        View::share('jenis', $jenis);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $columns = ['title', 'jenis', 'holi_date', 'enabled', 'action'];
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
        $validator = JsValidator::formRequest('App\Http\Requests\\' . $this->validate);
        return view($this->view . '.create')->with(compact('validator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HolidayRequest $request)
    {
        $input = $request->all();
        DB::beginTransaction();
        try {
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
        $data = $this->main_model->findOrFail($id);
        $validator = JsValidator::formRequest('App\Http\Requests\\' . $this->validate);
        return view($this->view . '.edit')->with(compact('validator', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function update(HolidayRequest $request, $id)
    {
        $input = $request->all();
        // dd($input);
        $data = $this->main_model->findOrFail($id);
        DB::beginTransaction();
        try {
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
     * @param  \App\Holiday  $holiday
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $data = $this->main_model->findOrFail($id);
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

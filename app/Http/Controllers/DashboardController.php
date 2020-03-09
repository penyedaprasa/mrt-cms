<?php

namespace App\Http\Controllers;

use App\Train;
use App\Role;
use App\RolePrivilege;
use App\SidebarMenu;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// use DB;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Controllers\Controller;
use App\Station;
use App\Dashboard;
use App\Helpers\General;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use JsValidator;

class DashboardController extends Controller
{   
    private $title;
    private $model;
    private $view;
    private $main_model;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct(Dashboard $main_model)
    {
        $this->title        = "Dashboard";
        $this->model        = "Dashboard";
        $this->view         = "dashboard";
        $this->main_model   = $main_model;
        $this->validate     = 'DashboardRequest';

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
        $title = "Dashboard";      
        $columns = ['digital_id', 
        'stations_name', 
        'stations_status', 
        'digital_created_at',
        'digital_status', 
        'digital_hit_now'
        ];

        if ($request->ajax()) {
            $datas = $this->main_model->select(["*"]);
            
            return Datatables::of($datas)
                ->addColumn('digital_status', function ($data) {
                    return view($this->view . '.digital_status', compact('data'));
                })
                // ->addColumn('image', function ($data) {
                //     return '<img src=' . url('storage/' . $data->image) . ' height="75">';
                // })
                // ->addColumn('time', function ($data) {
                //     return 'Open : '.$data->time_open.'-'. $data->time_close;
                // })
                ->addColumn('digital_hit_now', function($data) {
                    return view($this->view . '.show', compact('data'));
                })
                ->escapeColumns(['actions'])
                ->make(true);
        }
        return view($this->view . '.index')->with(compact('columns', 'title'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard_show($id)
    {
        dd($id);
    }

    /**
     * Setting Profile
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        if(Auth::check()){
            $user = User::find(Auth::user()->id);
            $role = Role::find($user->role_id);
            return view('dashboard.profile',compact('user','role'));
        } else {
            return redirect('/login');
        }
        
    }
    public function setting(Request $request)
    {
        $roles = Role::all();    
        $parent = $request->parent;
        $parents = SidebarMenu::where('parent',0)->get();
        if(empty($parent)){
            $sidebars = SidebarMenu::where('parent',0)->get();    
        } else {
            $sidebars = SidebarMenu::where('parent',$parent)->get();    
        }
        
        return view('dashboard.setting',compact('roles','sidebars','parents'));
    }
    public function account_lock()
    {
        return view('dashboard.account_lock');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function privileges($id)
    {
        $privileges = RolePrivilege::where('menu_id',$id)->get();
        $sidebar = SidebarMenu::find($id);
        $roles = Role::all();
        return view('dashboard.privileges',compact('privileges','sidebar','roles'));
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
    public function update_priv(Request $request)
    {
        $menuid=$request->menu_id;
        $roles = $request->role;
        $creates = $request->grant_create;
        $reads = $request->grant_read;
        $updates = $request->grant_update;
        $deletes = $request->grant_delete;
        // $result = array(
        //     'roles'=>$roles,
        //     'creates'=>$creates,'reads'=>$reads,'updates'=>$updates,'deletes'=>$deletes);
        // return $result;
        for($i=0;$i<count($roles);$i++){
            $priv = RolePrivilege::where('menu_id',$menuid)->where('role_id',$roles[$i])->first();
            if(empty($priv)){
                $priv = new RolePrivilege();
                $priv->menu_id=$menuid;
                $priv->role_id=$roles[$i];
            }
            $priv->grant_create=$creates[$i];
            $priv->grant_read=$reads[$i];
            $priv->grant_update=$updates[$i];
            $priv->grant_delete=$deletes[$i];
            
            $priv->save();

        }
        return redirect('/dashboard/setting');
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

<?php

namespace App\Http\Controllers;

use App\Train;
use App\Role;
use App\SidebarMenu;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index');
    }

    /**
     * Setting Profile
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return view('dashboard.profile');
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

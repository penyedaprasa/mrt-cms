<?php

namespace App\Http\Controllers;

use App\SidebarMenu;
use Illuminate\Http\Request;

class SidebarMenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(empty($request->id)){
            $sidebar = new SidebarMenu();
        } else {
            $sidebar = SidebarMenu::findOrFail($request->id);
        }
        $sidebar->title = $request->title;
        $sidebar->tooltip = $request->tooltip;
        $sidebar->route = $request->route;
        $sidebar->url = $request->url;
        $sidebar->parent = $request->parent;
        $sidebar->icon = $request->icon;
        $sidebar->enabled = $request->enabled;
        $sidebar->save();
        return redirect('dashboard/setting?parent='.$request->parent);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SidebarMenu  $sidebarMenu
     * @return \Illuminate\Http\Response
     */
    public function show(SidebarMenu $sidebarMenu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SidebarMenu  $sidebarMenu
     * @return \Illuminate\Http\Response
     */
    public function edit(SidebarMenu $sidebarMenu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SidebarMenu  $sidebarMenu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SidebarMenu $sidebarMenu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SidebarMenu  $sidebarMenu
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sidebar=SidebarMenu::findOrFail($id);
        $sidebar->delete();
        return redirect('dashboard/setting');
    }
}

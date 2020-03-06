<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Media;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index',compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medias = Media::all();
        return view('menu.create',compact('medias'));
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
            $menus = Menu::find($request->id);
            $menus->title = $request->title;
        } else {
            $menus = Menu::where('title',$request->title)->first();
            if(empty($menus)){
                $menus = new Menu();
                $menus->title = $request->title;
            }
        }
        if(!empty($request->icon)){
            $menus->icon=$request->icon;
        }
        if(!empty($request->image)){
            $menus->image=$request->image;
        }
        if(!empty($request->video)){
            $menus->video=$request->video;      
        }
        $menus->action_text = $request->action_text;
        $menus->action_url = $request->action_url;
        $menus->visible = $request->visible;
        
        $menus->save();
        return redirect('dashboard/menu');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medias = Media::all();
        $menu = Menu::find($id);
        return view('menu.edit',compact('medias','menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect('dashboard/menu');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}

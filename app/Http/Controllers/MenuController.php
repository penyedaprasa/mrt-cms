<?php

namespace App\Http\Controllers;

use App\Menu;
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
        return view('menu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menus = Menu::where('title',$request->title)->first();
        if(empty($menus)){
            $menus = new Menu();
            $menus->title = $request->title;
        }
        
        if($request->file('icon')){
            $path = $request->file('icon')->store('public/icons');
            $filename='icons/'.basename($path);
            $menus->icon=$filename;                
        }
        if($request->file('image')){
            $path = $request->file('image')->store('public/images');
            $filename='images/'.basename($path);
            $menus->image=$filename;                
        } 
        if($request->file('video')){
            $path = $request->file('video')->store('public/videos');
            $filename='videos/'.basename($path);
            $menus->video=$filename;                
            
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
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
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

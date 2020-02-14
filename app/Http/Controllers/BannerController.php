<?php

namespace App\Http\Controllers;

use App\Banner;
use App\Media;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::all();
        return view('banner.index',compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $videos = Media::where('mmtype', 'like', 'video%')->get();
        $images = Media::where('mmtype', 'like', 'image%')->get();
        return view('banner.create')->with(compact('videos','images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $banners = Banner::where('name',$request->name)->first();
        if(empty($banners)){
            $banners = new Banner();
            $banners->name = $request->name;
        }

        // if($request->file('image')){
        //     $path = $request->file('image')->store('public/images');
        //     $filename='images/'.basename($path);
        //     $banners->image=$filename;
        // }
        // if($request->file('video')){
        //     $path = $request->file('video')->store('public/videos');
        //     $filename='videos/'.basename($path);
        //     $banners->video=$filename;

        // }
        $banners->image = $request->image;
        $banners->video = $request->video;
        $banners->url = $request->url;
        $banners->visible = $request->visible;

        $banners->save();
        return redirect('dashboard/banner');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $banner = Banner::find($id);
        $videos = Media::where('mmtype', 'like', 'video%')->get();
        $images = Media::where('mmtype', 'like', 'image%')->get();
        return view('banner.edit')->with(compact('banner','videos','images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
}

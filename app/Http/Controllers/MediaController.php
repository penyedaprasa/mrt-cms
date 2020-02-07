<?php

namespace App\Http\Controllers;

use App\Media;
use File;
use Carbon;
use Thumbnail;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;

class MediaController extends Controller
{
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
        $medias = Media::all();
        return view('media.index',compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('media.create');
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
            $media = Media::findOrFail($request->id);
            $path = public_path()."/storage/".$media->filename;
            if(File::exists($path)){
                File::delete($path);
            } 
            $media->updated_at = date('Y-m-d H:i:s');
        } else {
            $media = new Media();
            $media->created_at = date('Y-m-d H:i:s');
            $media->updated_at = date('Y-m-d H:i:s');
        }
        $media->caption = $request->caption;
        // $media->filename = $request->filename;
        $validator = Validator::make($request->all(), [
            'file' => 'mimetypes:video/mp4,video/avi,video/mpeg,video/quicktime,image/png,image/jpg,image/jpeg'
        ]);
        if($validator->fails()){
            return redirect('dashboard/media/create');
        } else {
            
            $file = $request->file('file');
            $mimetype = $file->getMimeType();
            $mimes = explode('/',$mimetype);
            if(!empty($file)){
                if($mimes[0]=='video'){
                    $timestamp        = str_replace([' ', ':'], '-', Carbon::now()->toDateTimeString());
                    $file_name        = $timestamp;
                    $thumbnail_path   = public_path().'/storage/images';
                    $thumbnail_image  = "thumb_".$timestamp.".jpg";
                    $water_mark       = public_path().'/media/watermark.png';
                    $time_to_image    = 10;
                    $path = $file->store('public/videos');
                    // $thumbnail_status = Thumbnail::getThumbnail($path,$thumbnail_path,$thumbnail_image,$time_to_image);
                    $filename='videos/'.basename($path);
                    $media->thumbnail='images/'.$thumbnail_image; 
                }
                if($mimes[0]=='image'){
                    $path = $file->store('public/images');
                    $filename='images/'.basename($path);
                }
                $media->filename=$filename;                
                $media->mmtype = $mimetype;
            }
            
            
            $media->save();
            return redirect('dashboard/media');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function show(Media $media)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $media = Media::findOrFail($id);
        return view('media.edit',compact('media'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $media)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        $media = Media::findOrFail($id);
        // Storage::delete('storage/'.$media->filename);
        // return redirect('dashboard/media');
        $path = public_path()."/storage/".$media->filename;
        if(File::exists($path)){
            File::delete($path);
        } 
        $media->delete();
        return redirect('dashboard/media');
    }
}

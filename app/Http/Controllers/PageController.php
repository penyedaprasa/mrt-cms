<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\PageRequest;

use App\Page;
use App\Media;
use App\PageImage;
use App\PageVideo;

use App\Helpers\General;
use Illuminate\Support\Facades\DB;
use JsValidator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Yajra\DataTables\Facades\DataTables;

class PageController extends Controller
{
    private $title;
    private $model;
    private $view;
    private $main_model;

    public function __construct(Page $main_model)
    {
        $this->title        = "Digital Signage Page Management";
        $this->model        = "Page";
        $this->view         = "page";
        $this->main_model   = $main_model;
        $this->validate     = 'PageRequest';

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
        $columns = ['title', 'banner_text', 'time_visible', 'date_visible','action'];
        if ($request->ajax()) {
            $datas = $this->main_model->select(['*']);;
            return Datatables::of($datas)
                ->addColumn('action', function ($data) {
                    return view($this->view . '.action', compact('data'));
                })
                ->escapeColumns(['action'])
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
        $videos = DB::table('media')->where('mmtype','like','video%')->get();
        $images = DB::table('media')->where('mmtype','like','image%')->get();
        return view('page.create',compact('videos','images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            ['title'=>'required']);
        if($validator->fails()){
            $msg = array('status'=>false,'Judul tidak boleh kosong!');
        } else {
            $pages = Page::where('title',$request->title)->first();
            if(empty($pages)){
                $pages = new Page();
                $pages->title = $request->title;
            }
            $pages->banner_text = $request->banner_text;
            $pages->time_visible = $request->time_visible;
            $pages->date_visible = $request->date_visible;
            $pages->created_at = $request->created_at;
            $pages->updated_at = $request->updated_at;
            $pages->save();
            if(!empty($request->video)){
                $i=0;
                DB::table('page_videos')->where('page_id',$pages->id)->delete();
            foreach($request->video as $video){
                $pvideo = PageVideo::where('page_id',$pages->id)->where('video_url',$video)->first();
                if(empty($pvideo)){
                    $pvideo = new PageVideo();
                    $pvideo->page_id=$pages->id;
                    $pvideo->video_url=$video;
                }

                $pvideo->list_order = $i;
                $pvideo->save();
                $i++;
            }
            }
            if(!empty($request->image)){
                $i=0;
                DB::table('page_images')->where('page_id',$pages->id)->delete();
            foreach($request->image as $image){
                $pimage = PageImage::where('page_id',$pages->id)->where('image_url',$image)->first();
                if(empty($pimage)){
                    $pimage = new PageImage();
                    $pimage->page_id=$pages->id;
                    $pimage->image_url=$image;
                }

                $pimage->list_order = $i;
                $pimage->save();
                $i++;
            }
            }

            $msg = array('status'=>true,'message'=>'Update Halaman Sukses!','page'=>$pages);
        }
        return response()->json($msg);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        $page_videos = PageVideo::where('page_id',$id)->get();
        $page_images = PageImage::where('page_id',$id)->get();
        $videos = DB::table('media')->where('mmtype','like','video%')->get();
        $images = DB::table('media')->where('mmtype','like','image%')->get();
        return view('page.edit',compact('page','videos','images','page_videos','page_images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Page $page)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        $page = Page::find($id);
        $page->delete();
        return redirect('dashboard/page');
    }
}

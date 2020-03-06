<?php

namespace App\Http\Controllers;

use App\Train;
use App\Menu;
use App\Banner;
use App\BannerText;
use App\Page;
use App\PageImage;
use App\PageVideo;
use App\TrainSchedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $banners = Banner::all();
        $texts = BannerText::all();
        $menus = Menu::all();
        return view('landing',compact('banners','menus','texts'));
    }
    public function schedule(Request $request,$id)
    {
        $source = Station::find($id);
        $train = Train::find(1);
        $destinations = DB::table('v_source_destinations')->where('station_id',$id)
        ->get();
        
        
        return view('schedule',compact('source','destinations','train'));
    }
    public function page($id){
        $page = Page::find($id);
        $images = PageImage::where('page_id',$page->id)->get();
        $videos = PageVideo::where('page_id',$page->id)->get();
        return view('page.preview',compact('page','images','videos'));
    }
}

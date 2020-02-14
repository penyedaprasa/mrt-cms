<?php
namespace App\Http\Controllers\API;

use App\Page;
use App\PageVideo;
use App\PageImage;
use Illuminate\Http\Request;

class PageController extends Controller {
    public function index(){
        
        $pages = Page::all();
        $msg = array('status'=>true,'pages'=>$pages,'message'=>'Get All Page');
        return response()->json($msg);
    }
    public function media($id=NULL){
        if(!empty($id)){
            $page = Page::find($id);
            $videos = PageVideo::where('page_id',$id)->get();
            $images = PageImage::where('page_id',$id)->get();
            $msg = array('status'=>true,
            'page'=>$page,
            'images'=>$images,'videos'=>$videos,
            'message'=>'Get All Page Media');
        } else {
            $msg = array('status'=>false,'message'=>'Gagal Mengambil Media Page');
        }
        
        return response()->json($msg);
    }
}
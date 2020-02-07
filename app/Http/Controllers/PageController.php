<?php

namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::all();
        return view('page.index',compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page.create');
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
            $msg = array('status'=>true,'Menambahkan Halaman Sukses!','page'=>$pages);
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
        return view('page.edit',compact('page'));
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

<?php
namespace App\Helpers;

use App\SidebarMenu;
use Illuminate\Support\Facades\DB;
static class Helper {

  public static function sidebar_menu(){
      $parent=SidebarMenu::where('parent',0)->get();
      return view('layouts.sidebar_menu',compact('parent'));
  }
  public static function sidebar_submenu($id){
      $submenu=SidebarMenu::where('parent',id)->get();

  }
}

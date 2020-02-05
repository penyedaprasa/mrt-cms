<?php
namespace App\Helpers;

use App\SidebarMenu;
use App\RolePrivilege;
use Illuminate\Support\Facades\DB;
class Helper {

  public static function sidebar_menu(){
      $parents=SidebarMenu::where('parent',0)->get();
      return view('layouts.sidebar_menu',compact('parents'));
  }
  public static function sidebar_submenu($id){
      $menus=SidebarMenu::where('parent',$id)->get();
      return view('layouts.sidebar_submenu',compact('menus'));
  }
  public static function privilege_checked($menuid,$roleid,$field){
      $priv = RolePrivilege::where('menu_id',$menuid)
      ->where('role_id',$roleid)->first();
      if(!empty($priv)){
        switch($field){
          case 'read':
            return ($priv->grant_read=='Y') ? 'checked':'unchecked';
          break;
          case 'create':
            return ($priv->grant_create=='Y') ? 'checked':'unchecked';
          break;
          case 'update':
            return ($priv->grant_update=='Y') ? 'checked':'unchecked';
          break;
          case 'delete':
            return ($priv->grant_delete=='Y') ? 'checked':'unchecked';
          break;
        }
      } else {
        return '';
      }
      
  }
  public static function privilege_value($menuid,$roleid,$field){
    $priv = RolePrivilege::where('menu_id',$menuid)
    ->where('role_id',$roleid)->first();
    if(!empty($priv)){
      switch($field){
        case 'read':
          return $priv->grant_read;
        break;
        case 'create':
          return $priv->grant_create;
        break;
        case 'update':
          return $priv->grant_update;
        break;
        case 'delete':
          return $priv->grant_delete;
        break;
      }
    } else {
      return 'N';
    }
    
}
}

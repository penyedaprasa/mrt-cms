<?php
namespace App\Helpers;

use App\SidebarMenu;
use App\RolePrivilege;
use Illuminate\Support\Facades\DB;
class Helper {
  public static function create_radio($key,$options,$value){
    $html ="<div class=\"form-check\" id=\"$key\">";
    foreach($options as $option) {
      if($option==$value){
        $html.='<div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" id="radio_'.$option.'" name="'.$key.'" value="'.$option.'" checked>
        <label class="form-check-label" for="radio_'.$option.'">'.strtoupper($option).'</label>
    </div>';
      } else {
        $html.='<div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" id="radio_'.$option.'" name="'.$key.'" value="'.$option.'">
        <label class="form-check-label" for="radio_'.$option.'">'.strtoupper($option).'</label>
    </div>';
      }

    }
    return $html."</div>";
  }
  //697.398,00
  public static function create_checkbox($key,$options,$value){
    $html ="<div class=\"m-checkbox-inline\" id=\"$key\">";
    foreach($options as $option) {
      if(in_array($option,$value)){
        $html.='<div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="checkbox_'.$option.'" name="'.$key.'" value="'.$option.'" checked>
        <label class="form-check-label" for="checkbox_'.$option.'">'.strtoupper($option).'</label>
    </div>';
      } else {
        $html.='<div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" id="checkbox_'.$option.'" name="'.$key.'" value="'.$option.'">
        <label class="form-check-label" for="checkbox_'.$option.'">'.strtoupper($option).'</label>
    </div>';
      }

    }
    return $html;
  }
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

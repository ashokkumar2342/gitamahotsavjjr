<?php

namespace App\Helper;


use Illuminate\Support\Facades\Auth;
use Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MyFuncs {

  public static function removeSpacialChr($strValue)
  {
    $newString = trim(str_replace('\'', '', $strValue));
    $newString = trim(str_replace('\\', '', $newString));
    return $newString;
  }


  public static function question_no(){ 
    $rs_fetch = DB::select(DB::raw("select * from `default_value` limit 1;"));
    $question_no = $rs_fetch[0]->question_no;

    return $question_no;
  }


  public static function mainMenu($menu_type_id){ 
    $user_rs=Auth::guard('admin')->user();  
    $user_role = $user_rs->role_id;

    return $subMenus = DB::select(DB::raw("select `sm`.`id`, `sm`.`name`, `sm`.`status`, `sm`.`url` from `default_role_menu` `drm` inner join `sub_menus` `sm` on `sm`.`id` = `drm`.`sub_menu_id` where `drm`.`role_id` = $user_role and `drm`.`status` = 1 and `sm`.`menu_type_id` = $menu_type_id order by `sm`.`sorting_id` ;"));
  }


  public static function userHasMinu(){ 
    $user_rs=Auth::guard('admin')->user();  
    $user_role = $user_rs->role_id;
    return $menuTypes = DB::select(DB::raw("select * from `minu_types` where `id` in (select Distinct `sm`.`menu_type_id` from `default_role_menu` `drm` inner join `sub_menus` `sm` on `sm`.`id` = `drm`.`sub_menu_id` where `drm`.`role_id` = $user_role and `drm`.`status` = 1) order by `sorting_id` ;"));
  }

  public static function isPermission(){ 
    $user = Auth::guard('admin')->user();
    if(!empty($user)){ 
      $role_id = $user->role_id;
      $routeName = Route::currentRouteName();
      $rs_fetch = DB::select(DB::raw("select `id` from `sub_menus` where `url` = '$routeName' and `status` = 1;"));
      if (count($rs_fetch)>0){
        $menu_id = $rs_fetch[0]->id;
        $rs_fetch = DB::select(DB::raw("select `id` from `default_role_menu` where `role_id` = $role_id and `status` = 1 and `sub_menu_id` = $menu_id;"));
        if(count($rs_fetch) == 0){
          return false;    
        }
      }  
    }
    return true;
  }


  
  

  
  // public static function sendsms($mobile,$message,$tempateid){ 
    

     
  //    // $url = "http://smsdealnow.com/api/pushsms?user=eageskool&authkey=92OnWW5BqI2&sender=EXCNET&mobile=$mobile&text=$message EXCELNET&entityid=1701161891809058634&templateid=1707162253528439997&rpt=1";
  //    $url = "http://smsdealnow.com/api/pushsms?user=eageskool&authkey=  92OnWW5BqI2&sender=EXCNET&mobile=7903436369&text=Dear kumar, You have successfully registered for an account with your userid : kumar, password : pass. EXCELNET&entityid=  1701161891809058634&templateid=1707162253528439997&rpt=1";
     
  //    $ch = curl_init($url);
  //    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  //    $curl_scraped_page = curl_exec($ch);
  //    curl_close($ch); 
  //     \Log::info($url); 
  // }

    
  
    
}


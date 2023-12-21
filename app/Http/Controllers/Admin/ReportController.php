<?php

namespace App\Http\Controllers\Admin;

use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use PDF;

class ReportController extends Controller
{

  public function shgList()
  { 
    try {
      $admin=Auth::guard('admin')->user();
      $districts=DB::select(DB::raw("call up_fetch_district_access ($admin->id, 1)"));   
      return view('admin.report.shg_list',compact('districts'));
    } catch (Exception $e) {

    }

  }

  public function shgListGenerate(Request $request)
  { 
    try {

      if (empty($request->district)) {
        $response=array();
        $response["status"]=0;
        $response["msg"]='Plz Select District';
        return response()->json($response);  
      }

      $selfhelpgroups=DB::select(DB::raw("select * from `selfhelpgroups`"));
      $condition ='';
      if (!empty($request->district)) {
        $condition = $condition. " `dis`.`id` = '$request->district'"; 
      }
      if (!empty($request->block_mc)) {

        $condition = $condition. " and `blo`.`id` = '$request->block_mc'";
      }
      if (!empty($request->gram_panchayat)) {
        $condition = $condition. " and `gp`.`id` = '$request->gram_panchayat'"; 
      }
      if (!empty($request->village)) {
        $condition = $condition. " and `vill`.`id` = '$request->village'"; 
      }  
      $rs_result= DB::select(DB::raw("select `shg`.`id` as `shg_id`, `shg`.`group_name` as `shg_name`, `shg`.`shg_code`, `shg`.`formation_date`,`shg`.`account_no`,`shg`.`bank_name`,`shg`.`branch_name`,`shg`.`account_opening_date`, `dis`.`name` as `d_name`, `blo`.`name` as `b_name`, `gp`.`name` as `gp_name`, `vill`.`name` as `v_name` from `selfhelpgroups` `shg` inner join `districts` `dis` on `dis`.`id` = `shg`.`district_id` inner join `blocks_mcs` `blo` on `blo`.`id` = `shg`.`block_id`
        inner join `gram_panchayat` `gp` on `gp`.`id` = `shg`.`panchayat_id` inner join `villages` `vill` on `vill`.`id` = `shg`.`village_id` Where  $condition"));
      $response = array();
      $response['status'] = 1; 
      $response['data'] =view('admin.report.shg_list_result',compact('rs_result'))->render();
      return response()->json($response);
      
    } catch (Exception $e) {

    }

  }
   

  public function shgMember()
  { 
    try {
      $admin=Auth::guard('admin')->user();
      $districts=DB::select(DB::raw("call up_fetch_district_access ($admin->id, 1)"));  
      return view('admin.report.shg_member',compact('districts'));
    } catch (Exception $e) {

    }

  }

  public function shgMemberGenerate(Request $request)
  { 
    try {

      if (empty($request->district)) {
        $response=array();
        $response["status"]=0;
        $response["msg"]='Plz Select District';
        return response()->json($response);  
      }

      $selfhelpgroups=DB::select(DB::raw("select * from `selfhelpgroups`"));

      $condition ='';
      if (!empty($request->district)) {
        $condition = $condition. " `dis`.`id` = '$request->district'"; 
      }
      if (!empty($request->block_mc)) {

        $condition = $condition. " and `blo`.`id` = '$request->block_mc'";
      }
      if (!empty($request->gram_panchayat)) {
        $condition = $condition. " and `gp`.`id` = '$request->gram_panchayat'"; 
      }
      if (!empty($request->village)) {
        $condition = $condition. " and `vill`.`id` = '$request->village'"; 
      }

      $rs_result= DB::select(DB::raw("select `shg`.`id` as `shg_id`, `shg`.`group_name` as `shg_name`, `shg`.`shg_code`, `shg`.`formation_date`,`shg`.`account_no`,`shg`.`bank_name`,`shg`.`branch_name`,`shg`.`account_opening_date`, `dis`.`name` as `d_name`, `blo`.`name` as `b_name`, `gp`.`name` as `gp_name`, `vill`.`name` as `v_name` from `selfhelpgroups` `shg` inner join `districts` `dis` on `dis`.`id` = `shg`.`district_id` inner join `blocks_mcs` `blo` on `blo`.`id` = `shg`.`block_id`
        inner join `gram_panchayat` `gp` on `gp`.`id` = `shg`.`panchayat_id` inner join `villages` `vill` on `vill`.`id` = `shg`.`village_id` Where  $condition"));

      $response = array();
      $response['status'] = 1; 
      $response['data'] =view('admin.report.shg_member_result',compact('rs_result'))->render();
      return response()->json($response);
      
    } catch (Exception $e) {

    }

  }

 public function shgMemberfamily()
 { 
    try {
        $admin=Auth::guard('admin')->user();
        $districts=DB::select(DB::raw("call up_fetch_district_access ($admin->id, 1)"));  
        return view('admin.report.shg_member_family',compact('districts'));
    } catch (Exception $e) {
        
    } 
  }

  public function shgMemberfamilyGenerate(Request $request)
  { 
    try {

      if (empty($request->district)) {
        $response=array();
        $response["status"]=0;
        $response["msg"]='Plz Select District';
        return response()->json($response);  
      }

      $selfhelpgroups=DB::select(DB::raw("select * from `selfhelpgroups`"));
      $condition ='';
      if (!empty($request->district)) {
        $condition = $condition. " `dis`.`id` = '$request->district'"; 
      }
      if (!empty($request->block_mc)) {

        $condition = $condition. " and `blo`.`id` = '$request->block_mc'";
      }
      if (!empty($request->gram_panchayat)) {
        $condition = $condition. " and `gp`.`id` = '$request->gram_panchayat'"; 
      }
      if (!empty($request->village)) {
        $condition = $condition. " and `vill`.`id` = '$request->village'"; 
      }  
      $rs_result= DB::select(DB::raw("select `shg`.`id` as `shg_id`, `shg`.`group_name` as `shg_name`, `shg`.`shg_code`, `shg`.`formation_date`,`shg`.`account_no`,`shg`.`bank_name`,`shg`.`branch_name`,`shg`.`account_opening_date`, `dis`.`name` as `d_name`, `blo`.`name` as `b_name`, `gp`.`name` as `gp_name`, `vill`.`name` as `v_name` from `selfhelpgroups` `shg` inner join `districts` `dis` on `dis`.`id` = `shg`.`district_id` inner join `blocks_mcs` `blo` on `blo`.`id` = `shg`.`block_id`
        inner join `gram_panchayat` `gp` on `gp`.`id` = `shg`.`panchayat_id` inner join `villages` `vill` on `vill`.`id` = `shg`.`village_id` Where  $condition"));
      $response = array();
      $response['status'] = 1; 
      $response['data'] =view('admin.report.shg_member_family_result',compact('rs_result'))->render();
      return response()->json($response);

    } catch (Exception $e) {

    }

  }

   
}

<?php

namespace App\Http\Controllers\Admin;

use App\Helper\MyFuncs;
use App\Http\Controllers\Controller;
use App\Model\BlocksMc;
use App\Model\GramPanchayat; 
use App\Model\District;
use App\Model\Gender;
use App\Model\State;
use App\Model\Village;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use PDF;

class SHGDetailController extends Controller
{
   
    public function selfHelpGroup()
    {
    
        $admin = Auth::guard('admin')->user();
        $districts = DB::select(DB::raw("call up_fetch_district_access ($admin->id, 1)"));
        return view('admin.shgdetails.self_help_group',compact('districts'));
       
    }

    public function selfHelpGroupList(Request $request)
    {
       $selfHelpGroupList = DB::select(DB::raw(" select * from `shg_details` where `village_id`='$request->id'"));
       return view('admin.shgdetails.self_help_group_list',compact('selfHelpGroupList'));   
    }

    public function selfHelpGroupAddForm(Request $request, $rec_id=null)
    {   
        $district_id=$request->district_id;
        $block_mc=$request->block_mc;
        $gram_panchayat=$request->gram_panchayat;
        $village=$request->village;
        return view('admin.shgdetails.add_shg_form',compact('district_id','block_mc','gram_panchayat','village'));
       
    }

    public function addNewShgStore(Request $request, $id=null)
    {
        $id=Crypt::decrypt($id);
        try {
            $rules=[
            'district_id' => 'required',  
            'block_mc' => 'required',  
            'gram_panchayat' => 'required',  
            'village' => 'required',  
            'shg_name' => 'required',
        ];
        
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        $district_id = $request->district_id;
        $block_mc = $request->block_mc;
        $gram_panchayat = $request->gram_panchayat;
        $village = $request->village;
        $shg_name = MyFuncs::removeSpacialChr($request->shg_name);
        $formation_date = $request->formation_date;
        $total_member = $request->total_member;
        $account_no = $request->account_no;
        $bank_branch_name = MyFuncs::removeSpacialChr($request->bank_branch_name);
        $bank_ifsc = MyFuncs::removeSpacialChr($request->bank_ifsc);
        $date_of_rf = $request->date_of_rf;
        $amount_rf = $request->amount_rf;
        $ccl_dose = MyFuncs::removeSpacialChr($request->ccl_dose);
        $date_of_sanction = $request->date_of_sanction;
        $ccl_account_no = $request->ccl_account_no;
        $ccl_bank_branch_name = MyFuncs::removeSpacialChr($request->ccl_bank_branch_name);
        $ccl_bank_ifsc = MyFuncs::removeSpacialChr($request->ccl_bank_ifsc);
        $amount_rf = $request->amount_rf;
        $ccl_amount_sanction = $request->ccl_amount_sanction;

        if ($id==0) {
            $rs_save = DB::select(DB::raw("insert into `shg_details` (`district_id` , `block_id` , `panchayat_id` , `village_id` , `shg_name`, `formation_date`, `total_member`, `bank_account_no`, `bank_branch_name`, `bank_ifsc`, `date_of_rf`, `amount_rf`, `ccl_dose`, `date_of_sanction`, `ccl_ac_no`, `ccl_bank_branch_name`, `ccl_bank_ifsc`, `ccl_amt_sanction`) values ($district_id, $block_mc, $gram_panchayat, $village, '$shg_name', '$formation_date', '$total_member', '$account_no', '$bank_branch_name', '$bank_ifsc', '$date_of_rf', '$amount_rf', '$ccl_dose', '$date_of_sanction', '$ccl_account_no', '$ccl_bank_branch_name', '$ccl_bank_ifsc', '$ccl_amount_sanction');"));
            $response=['status'=>1,'msg'=>'Submit Successfully'];  
        }else{
            $rs_save = DB::select(DB::raw("update `shg_details` set `shg_name`='$shg_name', `formation_date`='$formation_date', `total_member`='$total_member', `bank_account_no`='$account_no', `bank_branch_name`='$bank_branch_name', `bank_ifsc`='$bank_ifsc', `date_of_rf`='$date_of_rf', `amount_rf`='$amount_rf', `ccl_dose`='$ccl_dose', `date_of_sanction`='$date_of_sanction', `ccl_ac_no`='$ccl_account_no', `ccl_bank_branch_name`='$ccl_bank_branch_name', `ccl_bank_ifsc`='$ccl_bank_ifsc', `ccl_amt_sanction`='$ccl_amount_sanction' where `id` = $id limit 1;"));
            $response=['status'=>1,'msg'=>'Update Successfully'];
        }
        return response()->json($response); 
        } catch (Exception $e) {
            
        }
    }

    public function selfHelpGroupEdit($id)
    {   
        $selfHelpGroupId=Crypt::decrypt($id);
        $selfHelpGroupList=DB::select(DB::raw("select * from `shg_details` where `id`='$selfHelpGroupId'"));
        $district_id = $selfHelpGroupList[0]->district_id;
        $block_mc = $selfHelpGroupList[0]->block_id;
        $gram_panchayat = $selfHelpGroupList[0]->panchayat_id;
        $village = $selfHelpGroupList[0]->village_id;
        return view('admin.shgdetails.add_shg_form',compact('selfHelpGroupId','selfHelpGroupList', 'district_id','block_mc','gram_panchayat','village'));
    }
    
       
    // public function selfHelpGroupAddMember($id=null)
    // {
    //     $selfHelpGroupId=$id;
    //     $relation_type=DB::select(DB::raw("select * from `relation_type`;"));
    //     $gender_type=DB::select(DB::raw("select * from `gender_type`;")); 
    //     $religion_type=DB::select(DB::raw("select * from `religion_type`;"));
        
        
    //    return view('admin.shgdetails.add_member',compact('selfHelpGroupId', 'relation_type', 'gender_type', 'religion_type'));   
    // }
    
    public function selfHelpGroupStoreMember(Request $request ,$id)
    {
        // return $request;
        $rules=[ 
            'member_name' => 'required', 
            'father_husband_name' => 'required', 
            'relation' => 'required', 
            'dob' => 'required',
        ];
        
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
        }
        $selfHelpGroupid = Crypt::decrypt($id);

        $selfHelpGroup = DB::select(DB::raw("insert into `shg_member_detail` (`shg_id`, `member_name`, `relation_name`, `relation_id`, `dob`, `age` , `gender_id`, `marital_status`, `caste`, `aadhar_no`, `ppp`, `mobile_no`, `address`, `pincode`, `account_no`, `bank_name`, `ifsc_code`, `pmjjby`, `pmjsby`, `apy`, `ayushman`, `education`, `technical`, `computer_knowledge`, `occupation`, `income`, `remaks` ) values ($selfHelpGroupid, '$request->member_name', '$request->father_husband_name', '$request->relation', '$request->dob', '$request->age', '$request->gender', '$request->marital_status', '$request->religion', '$request->aadhar_no', '$request->ppp', '$request->mobile_no', ' $request->address', '$request->pincode', '$request->account_no', '$request->bank_branch_name', '$request->ifsc_code', '$request->pmjjby', '$request->pmjsby', '$request->apy', '$request->ayushman', '$request->education_qualification', '$request->technical_knowledge', '$request->computer_knowledge', '$request->occupation', '$request->income', '$request->remaks');"));

        $response=['status'=>1,'msg'=>'Submit Successfully'];
        return response()->json($response); 
      
            
        
    }
    // public function selfHelpGroupViewMember($id)
    // {
    //    $selfHelpGroupid=Crypt::decrypt($id);
    //    $groupName=DB::select(DB::raw(" select * from `shg_details` where `id`='$selfHelpGroupid';"));
    //    $rs_updates=DB::select(DB::raw(" select * from `shg_member_detail` where `shg_id`='$selfHelpGroupid';"));
    //    return view('admin.shgdetails.view_member',compact('rs_updates','groupName','selfHelpGroupid'));   
    // }

    //  public function selfHelpGroupEditMember($id, $selfHelpGroupid)
    // {
    //     $rs_updates=DB::select(DB::raw(" select * from `shg_member_detail` where `shg_id`='$selfHelpGroupid';"));
    //     $shg_member_detail_id=Crypt::decrypt($id); 
    //     $relation_type=DB::select(DB::raw("select * from `relation_type`;"));
    //     $gender_type=DB::select(DB::raw("select * from `gender_type`;")); 
    //     $religion_type=DB::select(DB::raw("select * from `religion_type`;"));
        
    //     return view('admin.shgdetails.edit_member',compact('rs_updates', 'selfHelpGroupid', 'shg_member_detail_id', 'relation_type', 'gender_type', 'religion_type', 'Degignations', 'disability_type', 'handi_craft'));   
    // }

    public function selfHelpGroupUpdateMember(Request $request ,$id)
    {
       
        $rules=[ 
        'member_name' => 'required',  
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
        }
        $shg_member_detail_id = Crypt::decrypt($id); 
        $shg_member_detail_update = DB::select(DB::raw("update `shg_member_detail` set `member_name` = '$request->member_name', `relation_name` = '$request->father_husband_name' , `relation_id` = '$request->relation', `dob` ='$request->dob', `age` ='$request->age', `gender_id` = '$request->gender', `marital_status` = $request->marital_status, `caste` = '$request->religion', `aadhar_no` ='$request->aadhar_no', `ppp` ='$request->ppp', `mobile_no` ='$request->mobile_no', `address` = '$request->address' , `pincode` = '$request->pincode' , `account_no` ='$request->account_no', `bank_name` ='$request->bank_branch_name', `ifsc_code` ='$request->ifsc_code', `pmjjby` ='$request->pmjjby', `pmjsby` ='$request->pmjsby', `apy` ='$request->apy', `ayushman` ='$request->ayushman', `education`='$request->education_qualification', `technical`='$request->technical_knowledge', `computer_knowledge`='$request->computer_knowledge', `occupation` ='$request->occupation', `income` ='$request->income'  where `id` =$shg_member_detail_id;"));

        $response=['status'=>1,'msg'=>'Update Successfully'];
        return response()->json($response); 
       
    }


    public function shgmemberdetail()
    {
        $admin=Auth::guard('admin')->user();
        $districts=DB::select(DB::raw("call up_fetch_district_access ($admin->id, 1)"));
        return view('admin.shgmemberdetail.index',compact('districts'));
    }

    public function shgmemberdetailtable(Request $request)
    {
        $shgMemberDetails= DB::select(DB::raw("select * from `shg_member_detail` where `shg_id` =$request->id;"));
        return view('admin.shgmemberdetail.table',compact('shgMemberDetails'));
    }

    public function shgmemberdetailaddForm(Request $request)
    {
        $selfHelpGroupId=$request->shg_id;
        $relation_type=DB::select(DB::raw("select * from `relation_type`;"));
        $gender_type=DB::select(DB::raw("select * from `gender_type`;")); 
        $religion_type=DB::select(DB::raw("select * from `religion_type`;"));
        $Degignations=DB::select(DB::raw(" select * from `shg_member_desig_type`;"));
        $disability_type=DB::select(DB::raw("select * from `disability_type`;"));
        $handi_craft=DB::select(DB::raw("select * from `handi_craft`;"));
       return view('admin.shgmemberdetail.add_member_form',compact('selfHelpGroupId', 'relation_type', 'gender_type', 'religion_type', 'Degignations', 'disability_type', 'handi_craft'));
    }

    public function shgmemberdetailedit($member_id)
    {
        $shg_member_detail_id =Crypt::decrypt($member_id);      
        $rs_updates=DB::select(DB::raw(" select * from `shg_member_detail` where `id`='$shg_member_detail_id' limit 1;"));
        $relation_type=DB::select(DB::raw("select * from `relation_type`;"));
        $gender_type=DB::select(DB::raw("select * from `gender_type`;")); 
        $religion_type=DB::select(DB::raw("select * from `religion_type`;"));
        $Degignations=DB::select(DB::raw(" select * from `shg_member_desig_type`;"));
        $disability_type=DB::select(DB::raw("select * from `disability_type`;"));
        $handi_craft=DB::select(DB::raw("select * from `handi_craft`;"));
       return view('admin.shgmemberdetail.edit',compact('rs_updates', 'relation_type', 'gender_type', 'religion_type', 'Degignations', 'disability_type', 'handi_craft'));
    }

    public function shgmemberfamilydetail()
    {
        $admin=Auth::guard('admin')->user(); 
        $districts=DB::select(DB::raw("call up_fetch_district_access ($admin->id, 1)"));
        return view('admin.shgmemberfamilydetail.index',compact('districts'));
    }

    public function shgmemberfamilytable(Request $request)
    {
        $shgMemberfamily= DB::select(DB::raw("select * from `shg_member_family` where `shg_member_id` =$request->id;"));
        return view('admin.shgmemberfamilydetail.table',compact('shgMemberfamily'));
    }

    public function shgmemberfamilyaddForm(Request $request)
    {
        $shg_member_detail_id=$request->shg_member_detail_id; 
        $gender_type=DB::select(DB::raw("select * from `gender_type`;")); 
        $relation_type=DB::select(DB::raw("select * from `relation_type`;")); 
        $education_level=DB::select(DB::raw("select * from `education_level`;"));
       return view('admin.shgmemberfamilydetail.add_form',compact('shg_member_detail_id','gender_type','relation_type','education_level'));   
    }

    public function shgmemberfamilyStore(Request $request ,$id=null)
    {
        // return $request;
        try {
            $rules=[ 
            'name' => 'required', 
            'relation' => 'required', 
            
            ];
            
            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()) {
              $errors = $validator->errors()->all();
              $response=array();
              $response["status"]=0;
              $response["msg"]=$errors[0];
              return response()->json($response);// response as json
            }
            $id=Crypt::decrypt($id);
            if ($id==null) {
                $selfHelpGroup=DB::select(DB::raw("insert into `shg_member_family` (`shg_member_id` ,`name`, `relation_id`, `dob` , `age` , `gender_id` , `education`, `remaks` ) values ($request->shg_member_detail_id , '$request->name' , '$request->relation' , '$request->dob' , '$request->age' , '$request->gender' , '$request->education' , '$request->remaks');"));
             }else{
                
                $selfHelpGroup=DB::select(DB::raw("update `shg_member_family` set `name` ='$request->name', `relation_id` ='$request->relation', `dob` ='$request->dob', `age` ='$request->age', `gender_id` ='$request->gender', `education`='$request->education', `remaks`='$request->remaks' where `id`= $id limit 1"));

             } 
            

            $response=['status'=>1,'msg'=>'Submit Successfully'];
            return response()->json($response); 
        } catch (Exception $e) {
            
        }
    }

    public function shgmemberfamilyEdit($shg_member_family_id)
    {
        $shg_member_family_id=Crypt::decrypt($shg_member_family_id); 
        $rs_update=DB::select(DB::raw("select * from `shg_member_family` where `id` = $shg_member_family_id limit 1;")); 
        $gender_type=DB::select(DB::raw("select * from `gender_type`;")); 
        $relation_type=DB::select(DB::raw("select * from `relation_type`;")); 
        $education_level=DB::select(DB::raw("select * from `education_level`;"));
        return view('admin.shgmemberfamilydetail.add_form',compact('rs_update','gender_type','relation_type','education_level')); 
    } 

//------------------------------------------------------------------//

    public function shgAssets()
    {
        $admin=Auth::guard('admin')->user(); 
        $districts=DB::select(DB::raw("call up_fetch_district_access ($admin->id, 1)"));
        
        return view('admin.assets.index', compact('districts'));
    }

    public function shgAssetsTable(Request $request)
    {
        
        $assets = DB::select(DB::raw("select * from `assets` where `shg_id` = $request->id;"));
        return view('admin.assets.table', compact('assets'));
    }

    public function shgAssetsAdd(Request $request, $rec_id=null)
    {
        $shg_id = $request->shg_id; 
        return view('admin.assets.add_form', compact('shg_id'));
    }

    public function shgAssetsStore(Request $request, $shg_id)
    {
        $rules=[ 
        
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }

        $shg_id = Crypt::decrypt($shg_id);
        
        $rs_save = DB::select(DB::raw("insert into `assets` (`shg_id`, `house`, `area`, `room`, `branda` , `kitchen` , `toilet` , `open_space`, `agriculture_land`, `livestock`, `buffalo`, `cow`, `vehicle`, `public_transport`) values ($shg_id, $request->house, $request->area, $request->room, $request->barnda, $request->kitchen, $request->toilet, $request->open_space , $request->agriculture_land, $request->livestock, $request->buffalo, $request->cow, $request->vehicle, $request->public_transport);"));

        $response=['status'=>1,'msg'=>'Submit Successfully'];
        return response()->json($response);
    }
    
    
    

}


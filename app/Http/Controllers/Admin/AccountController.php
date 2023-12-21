<?php

namespace App\Http\Controllers\Admin;

use App\Admin; 
use App\Http\Controllers\Controller;
use App\Model\BlocksMc;
use App\Model\DefaultRoleMenu;
use App\Model\District;
use App\Model\Role;
use App\Model\State;
use App\Model\SubMenu;
use App\Model\UserBlockAssign;
use App\Model\UserDistrictAssign;
use App\Model\UserGpAssign;
use App\Model\UserVillageAssign;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Mail;
use PDF;
use Symfony\Component\HttpKernel\DataCollector\collect;
class AccountController extends Controller
{
    Public function index(){
    $admin=Auth::guard('admin')->user();	
    $accounts = DB::select(DB::raw("select `a`.`id`, `a`.`first_name`, `a`.`last_name`, `a`.`email`, `a`.`mobile`, `a`.`status`, `r`.`name`
             from `admins` `a`Inner Join `roles` `r` on `a`.`role_id` = `r`.`id`where`a`.`status` = 1 and `a`.`role_id` >= (Select `role_id` from `admins` where `id` = $admin->id)Order By `a`.`first_name`;")); 
    	return view('admin.account.list',compact('accounts'));
    }

    Public function form(Request $request){
        $admin=Auth::guard('admin')->user();       
    	$roles =DB::select(DB::raw("select `id`, `name` from `roles` where `id`  >= (Select `role_id` from `admins` where `id` =$admin->id) Order By `name`;"));
    	return view('admin.account.form',compact('roles'));
    }
   

    Public function store(Request $request){ 
        $rules=[
        'first_name' => 'required|string|min:3|max:50',             
        'email' => 'required|email|unique:admins',
        "mobile" => 'required|unique:admins|numeric|digits:10',
        "role_id" => 'required',
        "password" => 'required|min:6|max:15', 
        
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
         
    	$accounts = new Admin();
    	$accounts->first_name = $request->first_name;
    	$accounts->last_name = $request->last_name;
    	$accounts->role_id = $request->role_id;
    	$accounts->email = $request->email;
    	$accounts->password = bcrypt($request['password']);
    	$accounts->mobile = $request->mobile; 
    	$accounts->password_plain=$request->password;          
        $accounts->status=1;          
        $accounts->save(); 
        $response=['status'=>1,'msg'=>'Account Created Successfully'];
            return response()->json($response);   
    }

    

    Public function edit(Request $request,$account_id){
        $account_id=Crypt::decrypt($account_id);
        $admin=Auth::guard('admin')->user();       
        $roles =DB::select(DB::raw("select `id`, `name` from `roles` where `id`  >= (Select `role_id` from `admins` where `id` =$admin->id) Order By `name`;"));
        $accounts = DB::select(DB::raw("select * from `admins` where `id` =$account_id")); 
        return view('admin.account.edit',compact('accounts','roles')); 
    }

    Public function update(Request $request,$account_id){

       $this->validate($request,[
           'first_name' => 'required|string|min:3|max:50', 
           "mobile" => 'required|numeric|digits:10',
           "role_id" => 'required',
           "password" => 'nullable|min:6|max:15',             
                     
           ]);          
        
        $account = Admin::find($account_id);
        $account->first_name = $request->first_name;
        $account->last_name = $request->last_name;
        $account->role_id = $request->role_id; 
        if ($request['password']!=null) {
            $account->password = bcrypt($request['password']);
        } 
        $account->mobile = $request->mobile;
        
        if ($account->save())
         {
          return redirect()->route('admin.account.list')->with(['message'=>'Account Updated Successfully.','class'=>'success']);        
        }
        else{
            return redirect()->back()->with(['class'=>'error','message'=>'Whoops ! Look like somthing went wrong ..']);
            }
    }

    

    Public function DistrictsAssign(){
        $admin=Auth::guard('admin')->user(); 
        $users=DB::select(DB::raw("select `id`, `first_name`, `last_name`, `email`, `mobile` from `admins`where `status` = 1 and `role_id` = 2 and `role_id` >= (Select `role_id` from `admins` where `id` =$admin->id)Order By `first_name`")); 
        return view('admin.account.assign.district.index',compact('users'));
       
    }

    Public function StateDistrictsSelect(Request $request){  
     $States = State::all();   
     $DistrictBlockAssigns = UserDistrictAssign::where('user_id',$request->id)->where('status',1)->get();
     $data= view('admin.account.assign.district.select_box',compact('DistrictBlockAssigns','States'))->render(); 
    return response($data);

    }

     

     Public function DistrictsAssignStore(Request $request){    
        $rules=[
         'district' => 'required', 
         'user' => 'required',  
        ]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
          
       $UserDistrictAssign =UserDistrictAssign::firstOrNew(['user_id'=>$request->user,'district_id'=>$request->district]); 
       $UserDistrictAssign->district_id = $request->district;  
       $UserDistrictAssign->user_id = $request->user;   
       $UserDistrictAssign->status = 1; 
       $UserDistrictAssign->save(); 
        $response['msg'] = 'Save Successfully';
        $response['status'] = 1;
        return response()->json($response);  
    }

     public function DistrictsAssignDelete($id)
     {
         $UserDistrictAssign =UserDistrictAssign::find(Crypt::decrypt($id));
         $UserDistrictAssign->delete();
         $response['msg'] = 'Delete Successfully';
         $response['status'] = 1;
         return response()->json($response);   
     }
    //-----------block-assign----------------------------------//

    Public function BlockAssign(){
        $admin=Auth::guard('admin')->user(); 
        $users=DB::select(DB::raw("select `id`, `first_name`, `last_name`, `email`, `mobile` from `admins`where `status` = 1 and `role_id` = 3 and `role_id` >= (Select `role_id` from `admins` where `id` =$admin->id)Order By `first_name`")); 
        return view('admin.account.assign.block.index',compact('users'));
       
    }
    Public function DistrictBlockAssign(Request $request){ 
     $States = State::all();   
     $DistrictBlockAssigns = UserBlockAssign::where('user_id',$request->id)->where('status',1)->get();
     $data= view('admin.account.assign.block.select_box',compact('DistrictBlockAssigns','States'))->render(); 
    return response($data);

    }
    Public function DistrictBlockAssignStore(Request $request){     
        $rules=[
         'district' => 'required', 
         'block' => 'required', 
         'user' => 'required',  
        ]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
          
       $UserBlockAssign =UserBlockAssign::firstOrNew(['user_id'=>$request->user,'district_id'=>$request->district,'block_id'=>$request->block]); 
       $UserBlockAssign->district_id = $request->district;  
       $UserBlockAssign->user_id = $request->user;   
       $UserBlockAssign->block_id = $request->block;   
       $UserBlockAssign->status = 1; 
       $UserBlockAssign->save(); 
        $response['msg'] = 'Save Successfully';
        $response['status'] = 1;
        return response()->json($response);  
    }

    public function DistrictBlockAssignDelete($id)
     {
         $UserBlockAssign =UserBlockAssign::find(Crypt::decrypt($id));
         $UserBlockAssign->delete();
         $response['msg'] = 'Delete Successfully';
         $response['status'] = 1;
         return response()->json($response);   
     }


///------village-Assign-----------------------------------
   Public function gramPanchayatAssign(){
        $admin=Auth::guard('admin')->user(); 
        $users=DB::select(DB::raw("select `id`, `first_name`, `last_name`, `email`, `mobile` from `admins`where `status` = 1 and `role_id` = 4 and `role_id` >= (Select `role_id` from `admins` where `id` =$admin->id)Order By `first_name`")); 
        return view('admin.account.assign.grampanchayat.index',compact('users'));
       
    }
    Public function DistrictBlockgramPanchayatAssign(Request $request){ 
     $States = State::all();   
     $DistrictBlockAssigns = UserGpAssign::where('user_id',$request->id)->where('status',1)->get();
     $data= view('admin.account.assign.grampanchayat.select_box',compact('DistrictBlockAssigns','States'))->render(); 
    return response($data);

    }
    Public function DistrictBlockgramPanchayatAssignStore(Request $request){   
        $rules=[
         'district' => 'required', 
         'block' => 'required', 
         'gram_panchayat' => 'required', 
         'user' => 'required',  
        ]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
          
        $UserGpAssign =UserGpAssign::firstOrNew(['user_id'=>$request->user,'district_id'=>$request->district,'block_id'=>$request->block,'gp_id'=>$request->gram_panchayat]); 
        $UserGpAssign->user_id = $request->user;   
        $UserGpAssign->district_id = $request->district;  
        $UserGpAssign->block_id = $request->block;   
        $UserGpAssign->gp_id = $request->gram_panchayat;   
        $UserGpAssign->status = 1; 
        $UserGpAssign->save(); 
        $response['msg'] = 'Save Successfully';
        $response['status'] = 1;
        return response()->json($response);  
    }

    public function DistrictBlockgramPanchayatAssignDelete($id)
     {
         $UserGpAssign =UserGpAssign::find(Crypt::decrypt($id));
         $UserGpAssign->delete();
         $response['msg'] = 'Delete Successfully';
         $response['status'] = 1;
         return response()->json($response);   
     }
    

    
    

 
    

}

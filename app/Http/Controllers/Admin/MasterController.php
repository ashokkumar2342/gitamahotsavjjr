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

class MasterController extends Controller
{
   public function index()
   { 
     try {
          $States= State::orderBy('name','ASC')->get();   
          return view('admin.master.states.index',compact('States'));
        } catch (Exception $e) {
            
        }
     
   }
   public function store(Request $request,$id=null)
   {  
       $rules=[
            'code' => 'required|unique:states,code,'.$id, 
            'name' => 'required', 
            
            // 'syllabus' => 'required', 
      ];

      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      }
      else {
       $States= State::firstOrNew(['id'=>$id]);
       $States->code=$request->code;
       $States->name=$request->name;
        
       $States->save();
       $response=['status'=>1,'msg'=>'Submit Successfully'];
       return response()->json($response);
      }
    }
    public function edit($id)
     { 
       try {  
            $States= State::find($id);   
            return view('admin.master.states.edit',compact('States'));
          } catch (Exception $e) {
              
          }
       
     }

    public function delete($id)
    {
       $States= State::find(Crypt::decrypt($id));  
       $States->delete();
       return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);  
    }
//-------districts--------------districts--------------districts---------------districts----//



   public function districts(Request $request)
   {
      try {             
          $States= State::orderBy('name','ASC')->get();   
          return view('admin.master.districts.index',compact('States'));
        } catch (Exception $e) {
            
        }
   }
   public function districtsStore(Request $request,$id=null)
   {  
        $rules=[
            'states' => 'required', 
            'code' => 'required|unique:districts,code,'.$id, 
            'name' => 'required', 
        ]; 
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
        }
        $district=District::firstOrNew(['id'=>$id]);
        $district->state_id=$request->states;
        $district->code=$request->code;
        $district->name=$request->name; 
        $district->save(); 
        $response=['status'=>1,'msg'=>'Submit Successfully'];
       return response()->json($response);
      
    }
    public function DistrictsTable(Request $request)
    {
      $Districts= District::where('state_id',$request->id)->orderBy('name','ASC')->get();
      return view('admin.master.districts.district_table',compact('Districts'));
    }
    public function districtsEdit($id)
    {
       try {
          $Districts= District::find($id);
          $States= State::orderBy('name','ASC')->get();   
          return view('admin.master.districts.edit',compact('Districts','States'));
        } catch (Exception $e) {
            
        }
    }
    
    public function districtsDelete($id)
    {
       $District= District::find(Crypt::decrypt($id));  
       $District->delete();
       return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);  
    } 
    public function BlockMCS(Request $request)
   {
      try {
          
          $Districts= District::orderBy('name','ASC')->get();   
          $States= State::orderBy('name','ASC')->get();   
          $BlocksMcs= BlocksMc::orderBy('name','ASC')->get();   
          return view('admin.master.block.index',compact('Districts','States','BlocksMcs'));
        } catch (Exception $e) {
            
        }
   }
   
   public function BlockMCSStore(Request $request,$id=null)
   {   
       $rules=[
            'states' => 'required', 
            'district' => 'required', 
            'code' => 'required|unique:blocks_mcs,code,'.$id, 
            'name' => 'required', 
            
        ];

      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      }
      else {
       $BlocksMc= BlocksMc::firstOrNew(['id'=>$id]);
       $BlocksMc->states_id=$request->states;
       $BlocksMc->districts_id=$request->district; 
       $BlocksMc->code=$request->code;
       $BlocksMc->name=$request->name; 
       $BlocksMc->save(); 
       $response=['status'=>1,'msg'=>'Submit Successfully'];
       return response()->json($response);
      }
    }
    public function BlockMCSTable(Request $request)
    {  
       $BlocksMcs= BlocksMc::where('districts_id',$request->district_id)->orderBy('name','ASC')->get(); 
       return view('admin.master.block.block_table',compact('BlocksMcs'));
    }
    public function BlockMCSEdit($id)
    {
       try {
          
          $Districts= District::orderBy('name','ASC')->get();   
          $States= State::orderBy('name','ASC')->get();   
          $BlocksMcs= BlocksMc::find($id);  
          return view('admin.master.block.edit',compact('Districts','States','BlocksMcs'));
        } catch (Exception $e) {
            
        }
    }
    public function BlockMCSDelete($id)
    {
       $BlocksMc= BlocksMc::find(Crypt::decrypt($id));  
       $BlocksMc->delete();
       return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);  
    }
     
    
    //------------gramPanchayat----------------------------//
    public function gramPanchayat()
    {
         try {             
          $States= State::orderBy('name','ASC')->get();   
          return view('admin.master.grampanchayat.index',compact('States'));
        } catch (Exception $e) {
            
        }
    }
    public function gramPanchayatStore(Request $request,$id=null)
   {  
       $rules=[
             
            'states' => 'required', 
            'district' => 'required',  
            'block_mc' => 'required',  
            'code' => 'required|unique:gram_panchayat,code,'.$id, 
            'name' => 'required', 
           
      ];

      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      }
      else {
        $GramPanchayat=GramPanchayat::firstOrNew(['id'=>$id]); 
        $GramPanchayat->states_id=$request->states; 
        $GramPanchayat->district_id=$request->district; 
        $GramPanchayat->block_id=$request->block_mc; 
        $GramPanchayat->code=$request->code; 
        $GramPanchayat->name=$request->name; 
        $GramPanchayat->save(); 
       $response=['status'=>1,'msg'=>'Submit Successfully'];
       return response()->json($response);
      }
    }
    public function gramPanchayatTable(Request $request)
    {
      $GramPanchayats= GramPanchayat::where('block_id',$request->id)->orderBy('states_id','ASC')->orderBy('district_id','ASC')->orderBy('block_id','ASC')->orderBy('code','ASC')->get();
      return view('admin.master.grampanchayat.gp_table',compact('GramPanchayats')); 
    }
    public function gramPanchayatEdit($id)
    {
       try {
          $GramPanchayat=GramPanchayat::find($id); 
          return view('admin.master.grampanchayat.gp_edit',compact('GramPanchayat'));
        } catch (Exception $e) {
            
        }
    }
    public function gramPanchayatDelete($id)
    {
       $GramPanchayat= GramPanchayat::find($id); 
       $GramPanchayat->Delete();
       $response=['status'=>1,'msg'=>'Delete Successfully'];
       return response()->json($response);
    }
    //------------village----------------------------//

    public function village(Request $request)
   {
      try {
          $Districts= District::orderBy('name','ASC')->get();   
          $States= State::orderBy('name','ASC')->get();   
          $BlocksMcs= BlocksMc::orderBy('name','ASC')->get();   
          $Villages= Village::orderBy('name','ASC')->get(); 
          return view('admin.master.village.index',compact('Districts','States','BlocksMcs','Villages'));
        } catch (Exception $e) {
            
        }
   }
   
   
    public function villageTable(Request $request)
    {
      $Villages= Village::where('gram_panchayat_id',$request->id)->orderBy('states_id','ASC')->orderBy('districts_id','ASC')->orderBy('blocks_id','ASC')->orderBy('code','ASC')->get();
      return view('admin.master.village.village_table',compact('Villages')); 
    }
    public function villageEdit($id)
    {
       try {
          $village=Village::find($id); 
          return view('admin.master.village.edit',compact('village'));
        } catch (Exception $e) {
            
        }
    }
    public function villageStore(Request $request,$id=null)
   {  
       $rules=[
             
            'states' => 'required', 
            'district' => 'required',  
            'gram_panchayat' => 'required',  
            'block_mc' => 'required',  
            'code' => 'required|unique:villages,code,'.$id, 
            'name' => 'required', 
           
      ];

      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
      }
      else {
        $village=Village::firstOrNew(['id'=>$id]); 
        $village->states_id=$request->states; 
        $village->districts_id=$request->district; 
        $village->blocks_id=$request->block_mc; 
        $village->gram_panchayat_id=$request->gram_panchayat; 
        $village->code=$request->code; 
        $village->name=$request->name; 
        $village->save(); 
       $response=['status'=>1,'msg'=>'Submit Successfully'];
       return response()->json($response);
      }
    }
    public function villageDelete($id)
    {
       $Village= Village::find($id); 
       $Village->Delete();
       $response=['status'=>1,'msg'=>'Delete Successfully'];
       return response()->json($response);
    }
   
    
//----------------------------------------------
    public function stateWiseDistrict(Request $request)
    {
       try{ 
            $admin=Auth::guard('admin')->user(); 
          // $Districts=DB::select(DB::raw(" select * from `districts` where `state_id`='$request->id'"));   
            $Districts=DB::select(DB::raw("call up_fetch_district_access ($admin->id, '$request->id')"));   
          return view('admin.master.districts.value_select_box',compact('Districts'));
        } catch (Exception $e) {
            
        }
    }
    
    public function DistrictWiseBlock(Request $request,$print_condition=null)
    {
       try{
            $admin=Auth::guard('admin')->user(); 
            $BlocksMcs=DB::select(DB::raw("call up_fetch_block_access ($admin->id, '$request->id')")); 
            return view('admin.master.block.value_select_box',compact('BlocksMcs'));
        } catch (Exception $e) {
            
        }
    }
    
    
    public function BlockWiseGramPanchayat(Request $request)
    {
       try{  
          $admin=Auth::guard('admin')->user(); 
          $GramPanchayat=DB::select(DB::raw("call up_fetch_gp_access ($admin->id , '$request->id')"));
         
          return view('admin.master.grampanchayat.gp_select_box',compact('GramPanchayat'));
        } catch (Exception $e) {
            
        }
    }
    public function GramPanchayatWiseVillage(Request $request)
    {
       try{  
          $admin=Auth::guard('admin')->user(); 
          $villages=DB::select(DB::raw(" select * from `villages` where `gram_panchayat_id`='$request->id'"));  
          return view('admin.master.village.village_select_box',compact('villages'));
        } catch (Exception $e) {
            
        }
    }

    public function villageWiseShg(Request $request)
    {
        $shgdetails=DB::select(DB::raw(" select * from `shg_details` where `village_id`='$request->id'"));
        return view('admin.shgmemberdetail.shg_select_box',compact('shgdetails'));
    }

    public function shgWiseMember(Request $request)
    {
        $shgmemberdetails=DB::select(DB::raw(" select * from `shg_member_detail` where `shg_id`='$request->id'"));
        return view('admin.shgmemberfamilydetail.member_select_box',compact('shgmemberdetails'));
    }

    public function transactionType()
    {
        $transactionTypes=DB::select(DB::raw(" select * from `transaction_type`"));
        return view('admin.master.transactiontype.index',compact('transactionTypes'));
    }

    public function transactionTypeStore(Request $request)
    {
        $rules=[ 
            'name' => 'required',  
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
          $errors = $validator->errors()->all();
          $response=array();
          $response["status"]=0;
          $response["msg"]=$errors[0];
          return response()->json($response);// response as json
        }
        $rs_save=DB::select(DB::raw("insert into `transaction_type` (`name`) values ('$request->name')")); 
        $response=['status'=>1,'msg'=>'Submit Successfully'];
        return response()->json($response);
      
    }

    public function transactionTypeDelete($id)
    {
       $id=Crypt::decrypt($id);  
       $delete=DB::select(DB::raw("delete from `transaction_type` where `id` = $id"));
       return redirect()->back()->with(['message'=>'Delete Successfully','class'=>'success']);  
    }

    public function transactionTypeEdit($id)
    {
       $id=Crypt::decrypt($id);  
       $rs_update=DB::select(DB::raw("select * from `transaction_type` where `id` = $id"));
       return view('admin.master.transactiontype.edit',compact('rs_update'));
    }

    public function transactionTypeUpdate(Request $request, $id)
    {
        $rules=[ 
            'name' => 'required',  
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
        $rs_save=DB::select(DB::raw("update `transaction_type` set `name`= '$request->name'  where `id` = $id ")); 
        $response=['status'=>1,'msg'=>'Update Successfully'];
        return response()->json($response);
      
    }
    
    
}

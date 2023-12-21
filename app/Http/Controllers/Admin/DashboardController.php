<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Model\Exam\Option;
use App\Model\Exam\Question;
use App\Model\Exam\QuestionMaster;
use App\Model\Exam\UserQuestionAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Laravel\Passport\createToken;
use Storage;
use Carbon\Carbon;
class DashboardController extends Controller
{
    
    public function index()
    {  
        $admins=Auth::guard('admin')->user();
        $rs_fetch = DB::select(DB::raw("select * from `default_value` limit 1;"));
        $refresh_timing = $rs_fetch[0]->refresh_timing;
        $quiz_start_time = $rs_fetch[0]->quiz_start_time;              
        $max_time = $rs_fetch[0]->max_time;
        if ($admins->role_id == 1) {
            return view('admin/dashboard/dashboard', compact('quiz_start_time', 'refresh_timing'));
        }elseif($admins->role_id == 2) {
            $rs_update = DB::select(DB::raw("select * from `status_master` limit 1 ;"));
            if ($rs_update[0]->status==2) {
                return $this->startexam($max_time);
            }elseif ($rs_update[0]->status==3) {
                return $this->reviewexam();
            }elseif ($rs_update[0]->status==4) {
                return $this->rankPosition();
            }else{    
                return view('admin/dashboard/score_board_dashboard',compact('admins', 'quiz_start_time', 'refresh_timing'));
            }
        }elseif($admins->role_id == 3){
            $rs_update = DB::select(DB::raw("select * from `status_master` limit 1 ;"));
            if ($rs_update[0]->status==2) {
                return $this->startexam($max_time);
            }elseif ($rs_update[0]->status==3) {
                return $this->reviewexam();
            }elseif ($rs_update[0]->status==4) {
                return $this->rankPosition();
            }else{    
                return view('admin/dashboard/public_dashboard',compact('admins', 'quiz_start_time', 'refresh_timing'));
            }
        }
    }

    public function userprofileUpdate(Request $request)
    {
        $rules=[
            'name' => 'required',
            'email' => 'required',
            'image' => 'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        $admins = Auth::guard('admin')->user();
        if ($request->hasFile('image')){
            $image=$request->image;
            $filename = $admins->id.'.jpg'; 
            $image->storeAs('profile_pic/',$filename);
        }
        $rs_update = DB::select(DB::raw("update `admins` set `name` = '$request->name', `email` = '$request->email', `profile` = '$filename', `profile_status` = 1 where `id` = $admins->id limit 1;"));
        $response=['status'=>1,'msg'=>'Updated Successfully'];
        return response()->json($response); 
    }

    public function startQuiz()
    {
        $rs_update = DB::select(DB::raw("update `status_master` set `status` = 1  limit 1 ;"));
        return Redirect()->back()->with(['message'=>'Quiz Start Successfully','class'=>'success']);   
    }

    public function sendQuestion()
    {
        $rs_update = DB::select(DB::raw("update `status_master` set `status` = 2  limit 1 ;"));
        return Redirect()->back()->with(['message'=>'Question Send Successfully','class'=>'success']);   
    }

    public function showAnswer()
    {
        $rs_update = DB::select(DB::raw("update `status_master` set `status` = 3  limit 1 ;"));
        return Redirect()->back()->with(['message'=>'Show Answer Successfully','class'=>'success']);   
    }

    public function showScoreBoard()
    {
        $rs_update = DB::select(DB::raw("update `status_master` set `status` = 4  limit 1 ;"));
        return Redirect()->back()->with(['message'=>'Show Score Board Successfully','class'=>'success']);   
    }

    public function rankPosition()
    {
        return view('admin/dashboard/rank_position');   
    }  

    public function startexam($max_time)
    {  
        $user_id = Auth::guard('admin')->user()->id;
        $rs_fetch = DB::select(DB::raw("select * from `default_value` limit 1;"));
        $total_question = $rs_fetch[0]->total_question;
        $max_time = $rs_fetch[0]->max_time; 
        $second = 0;
        $minute = $max_time;
        $carbon = new Carbon(); 
        $dt = Carbon::now();
        $start_time = $dt->toDateTimeString();
        $current_second = ($max_time * 60) - strtotime($start_time); ;
        $minute = floor(($current_second / 60) % 60);
        $second = $current_second % 60;
        $rs_questions = DB::select(DB::raw("select * from `questions` where `title` = 'Indian National Flag' limit 1;"));
        $rs_save = DB::select(DB::raw("insert into `question_master`(`user_id`, `start_time`, `total_time`, `total_question`, `total_question_id`) values($user_id, '$start_time', '$max_time', '$total_question', '');"));
        return view('admin/dashboard/show_question',compact('rs_questions', 'max_time')); 
        
    }

    public function answerStore(Request $request)
    {  
        $user_id = Auth::guard('admin')->user()->id;
        $question_no = 1;
        $question_id = $request->question_id;
        $option_id = $request->option_id;
        $rs_fetch = DB::select(DB::raw("select * from `options` where `id` = $option_id and`question_id` = $question_id  and `is_correct_ans` = 1 limit 1;"));
        if (count($rs_fetch) > 0) {
            $marks = 1;    
        }else{
            $marks = 0;   
        }
        $status = 0;
        $rs_save_ans = DB::select(DB::raw("insert into `user_question_answer`(`user_id`, `question_no`, `question_id`, `option_id`, `marks`, `status`) values($user_id, $question_no, $question_id, $option_id, $marks, $status);"));

        $dt = Carbon::now();
        $time = $dt->toDateTimeString();
        $rs_update = DB::select(DB::raw("update `question_master` set `end_time` = $time where `user_id` = $user_id limit 1;")); 
        return Redirect()->back()->with(['message'=>'Save Successfully','class'=>'success']);  
        
    }

    public function endexam()
    {
        $dt = Carbon::now();
        $time = $dt->toDateTimeString();
        $user_id = Auth::guard('admin')->user()->id;
        $rs_update = DB::select(DB::raw("update `question_master` set `end_time` = $time where `user_id` = $user_id limit 1;"));
        return redirect('admin/dashboard');
        
    }
    public function reviewexam()
    {
        $user_id = Auth::guard('admin')->user()->id;  
        $QuestionMasters = QuestionMaster::where('user_id',$user_id)->first(); 
        $array_id=explode(',',$QuestionMasters->total_question_id);
        $questions=Question::where('title','Indian National Flag')->with('options')->find($array_id);        
        
        return view('admin/dashboard/review_question',compact('questions','user_id'));
    }  

    
    public function finishCofirm(Request $request)
    {  
        $response =array();
        $response['status'] =1;
        $response['msg'] ="Successfully";
        $response['data']=view('admin.dashboard.finish_confirm')->render();
        return $response;
          
        
    } 
    public function finish(Request $request)
    {  
          return 'finish';
        
    }
    public function autofinish(Request $request)
    {  
          return 'autofinish';
        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showStudentDetails(Request $request)
    {
        $classes = ClassType::all();
        $students = Student::all(); 
        return view('admin/dashboard/studentDetails',compact('classes','students'))->render();
    }
    //show Student Registration Details 
    public function showStudentRegistrationDetails(Request $request)
    {
        $classes = ClassType::all();
       $students = ParentRegistration::all(); 
        return view('admin/dashboard/studentRegistrationDetails',compact('classes','students'))->render();
    }

    public function passportTokenCreate(){
        $user = Admin::find(1);
        // Creating a token without scopes...
        $token = $user->createToken('Student')->accessToken;

        // Creating a token with scopes...
       // $token = $user->createToken('My Token', ['place-orders'])->accessToken;
        return $token;
    }

    public function proFile()
    {
        $admins = Auth::guard('admin')->user();
         return view('admin/dashboard/profile/view',compact('admins'));
    }
    public function proFileShow()
    {
        $admins = Auth::guard('admin')->user();
         return view('admin/dashboard/profile/profile_show',compact('admins'));
    }
    
    // public function userprofileUpdate(Request $request)
    // {
           
    //     $user_id = Auth::guard('admin')->user()->id;
    //      $rules=[
          
    //         'name' => 'required',
    //         'mobile' => 'required|digits:10',
    //         'email' => 'required',
    //         'dob' => 'required',
    //         'relation' => 'required',
    //         'father_name' => 'required',
    //         'address' => 'required',
          
            
    //     ];

    //     $validator = Validator::make($request->all(),$rules);
    //     if ($validator->fails()) {
    //         $errors = $validator->errors()->all();
    //         $response=array();
    //         $response["status"]=0;
    //         $response["msg"]=$errors[0];
    //         return response()->json($response);// response as json
    //     }
    //     else { 
                
    //             $admins=Profile::where('user_id',$user_id)->first();
    //             if (!isset($admins)) {
    //                 $admins=new Profile();
    //             }
    //             $admins->name=$request->name;
    //             $admins->user_id=$user_id;
    //             $admins->email=$request->email;
    //             $admins->mobile=$request->mobile;
    //             $admins->dob=$request->dob == null ? $request->dob : date('Y-m-d',strtotime($request->dob));
    //             $admins->relation=$request->relation; 
    //             $admins->father_name=$request->father_name; 
    //             $admins->address=$request->address; 
    //             $admins->updated=1; 
    //             $admins->save();
    //             $st=Admin::find($user_id);
    //             $dirpath = Storage_path() . "/app/student/profile/admin";
    //             $vpath = '/student/profile/admin';
    //             @mkdir($dirpath, 0755, true);
    //             $file =$request->image;
    //             $imagedata = file_get_contents($file);
    //             $encode = base64_encode($imagedata);
    //             $image=base64_decode($encode); 
    //             $name =$user_id.'.jpg';
    //             $image= \Storage::disk('local')->put($vpath.'/'.$name,$image);
    //             $st->profile_pic = $name;
    //             $st->save(); 
                
    //             $response=['status'=>1,'msg'=>'Update Successfully'];
    //             return response()->json($response); 
    //         } 
          
    // }
    public function profilePhoto()
    {
         
         return view('admin/dashboard/profile/profile_upload',compact('admins'));
    } 
    public function profilePhotoUpload(Request $request)
    {
        $admins = Auth::guard('admin')->user();
         $rules=[
          
             // 'image' => 'required|mimes:jpeg,jpg,png,gif|max:5000'          
            
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
                $data = $request->image; 
                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);
                $data = base64_decode($data);
                $image_name= time().'.jpg';       
                $path = Storage_path() . "/app/student/profile/admin/" . $image_name; 
                @mkdir(Storage_path() . "/app/student/profile/admin/", 0755, true);     
                file_put_contents($path, $data); 
                $admins->profile_pic = $image_name;
                $admins->save();
                return response()->json(['success'=>'done']);
            
            
          }
    }
     public function proFilePhotoShow($path)
     {
        $path=Crypt::decrypt($path);
        $storagePath = Storage_path() .'/app/profile_pic/'. $path;              
        $mimeType = mime_content_type($storagePath); 
        if( ! \File::exists($storagePath)){

          return view('error.home');
        }
        $headers = array(
          'Content-Type' => $mimeType,
          'Content-Disposition' => 'inline; '
        );            
        return \Response::make(file_get_contents($storagePath), 200, $headers);

         // $profile_pic = Storage::disk('profile_pic')->get($profile_pic);           
         // return  response($profile_pic)->header('Content-Type', 'image/jpeg');
     }
     public function profilePhotoRefrash()
      {
          return view('admin.dashboard.profile.photo_refrash');
      } 
     public function passwordChange(Request $request)
    {
        $rules=[
          'old_password' => 'required', 
          'password' => 'required|min:6|max:50', 
          'confirm_password' => 'required|min:6|max:50', 
        ];

        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $response=array();
            $response["status"]=0;
            $response["msg"]=$errors[0];
            return response()->json($response);// response as json
        }
        if ($request->confirm_password!=$request->password) {
            $response =array();
            $response['status'] =0;
            $response['msg'] ='Password Not Match';
            return $response;
        }
       $admin=Auth::guard('admin')->user();
        if (Hash::check($request->old_password, $admin->password))
        {
           $newPasswrod = Hash::make($request->password);
            $st=Admin::find($admin->id);
            $st->password =$newPasswrod ;
            $st->save();
            $response =array();
            $response['status'] =1;
            $response['msg'] ='Password Updated Successfully';
            return $response;
        }else{
           return 'not fond';
        }

    }
   
}

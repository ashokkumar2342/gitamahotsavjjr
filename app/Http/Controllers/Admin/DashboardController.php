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
        $quiz_start_time = $rs_fetch[0]->quiz_start_time;              
        $refresh_timing = $rs_fetch[0]->refresh_timing;
        if ($admins->role_id == 1) {
            $rs_update = DB::select(DB::raw("select * from `status_master` limit 1 ;"));
            if ($rs_update[0]->status==0) {
                return view('admin/dashboard/dashboard', compact('quiz_start_time'));   
            }elseif ($rs_update[0]->status==1) {
                return view('admin/dashboard/dashboard_1');   
            }elseif ($rs_update[0]->status==2) {
                $rs_questions = DB::select(DB::raw("select `id` as `q_id`, `details` as `q_detail` from `questions` where `status` = 1 order by `id` desc limit 1;"));
                $rs_fetch = DB::select(DB::raw("select * from `default_value` limit 1;"));
                $max_time = $rs_fetch[0]->max_time;
                
                $max_min = intval($max_time/60);
                if($max_min*60 > $max_time){
                    $max_min = $max_min - 1;
                }
                $max_sec = $max_time - $max_min*60;
                $is_refresh = 1;

                $refresh_time = 0;
                if($max_time == 0){
                    $refresh_time = 2000;
                }
                $show_answer = 0;
                $question_no = $rs_fetch[0]->question_no;
                return view('admin/dashboard/dashboard_2', compact('rs_questions', 'max_min', 'max_sec', 'refresh_time', 'show_answer', 'question_no'));   
            }elseif ($rs_update[0]->status==3) {
                $rs_fetch = DB::select(DB::raw("select * from `default_value` limit 1;"));
                $question_no = $rs_fetch[0]->question_no;
                $rs_questions = DB::select(DB::raw("select `id` as `q_id`, `details` as `q_detail` from `questions` where `status` = 2 order by `id` desc limit 1;"));
                return view('admin/dashboard/dashboard_3', compact('rs_questions', 'question_no'));   
            }elseif ($rs_update[0]->status==4) {
                $rs_fetch = DB::select(DB::raw("select * from `default_value` limit 1;"));
                $question_no = $rs_fetch[0]->question_no;
                $total_question = $rs_fetch[0]->total_question;
                $rs_score = DB::select(DB::raw("select `usr`.`id`, `usr`.`name`, `usr`.`mobile`, `usr`.`email`, `usr`.`profile`, `scr`.`score` from `admins` `usr` inner join ( select `qq`.`user_id`, sum(`qq`.`question_score`) as `score` from `quiz_questions` `qq` group by `qq`.`user_id`) as `scr` on `scr`.`user_id` = `usr`.`id` order by `scr`.`score` desc;"));
                $end_quiz = 0;
                if($question_no == $total_question){
                    $end_quiz = 1;
                }
                return view('admin/dashboard/dashboard_4', compact('rs_score', 'end_quiz'));   
            }
            
        }elseif($admins->role_id == 2) {
            $rs_update = DB::select(DB::raw("select * from `status_master` limit 1 ;"));
            if ($rs_update[0]->status==2) {
                return $this->startexam();
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
                return $this->startexam();
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
        return redirect('admin/dashboard');    
    }

    public function sendQuestion()
    {
        $rs_update = DB::select(DB::raw("call `up_assign_question`();"));
        return redirect('admin/dashboard');    
    }

    public function showAnswer()
    {
        $rs_update = DB::select(DB::raw("update `status_master` set `status` = 3  limit 1 ;"));
        return redirect('admin/dashboard');  
    }

    public function showScoreBoard()
    {
        $rs_update = DB::select(DB::raw("update `status_master` set `status` = 4  limit 1 ;"));
        return redirect('admin/dashboard');    
    }

    public function sendNextQuestion()
    {
        return $this->sendQuestion(); 
    }

    public function rankPosition()
    {
        return view('admin/dashboard/rank_position');   
    }  

    public function startexam()
    {  
        $user_id = Auth::guard('admin')->user()->id;
        $rs_questions = DB::select(DB::raw("call `up_fetch_question`($user_id);"));
        $max_time = $rs_questions[0]->max_time;
        
        $max_min = intval($max_time/60);
        if($max_min*60 > $max_time){
            $max_min = $max_min - 1;
        }
        $max_sec = $max_time - $max_min*60;
        $is_refresh = $rs_questions[0]->page_refresh;

        $refresh_time = 0;
        if($max_time == 0){
            $refresh_time = 2000;
        }
        if($is_refresh == 0){
            return view('admin/dashboard/show_question',compact('rs_questions', 'max_min', 'max_sec', 'refresh_time'));     
        }else{
            return view('admin/dashboard/show_question_after_submit',compact('rs_questions', 'max_min', 'max_sec', 'refresh_time')); 
        }
        
        
    }

    public function answerStore(Request $request)
    {  
        // return $request;
        $user_id = Auth::guard('admin')->user()->id;
        $question_no = 1;
        $question_id = $request->question_id;
        $option_id = $request->option_id;
        // $query = "call `up_submit_answer`($user_id, $question_id, $option_id);";
        // return $query;
        $rs_store = DB::select(DB::raw("call `up_submit_answer`($user_id, $question_id, $option_id);"));
        
        // $rs_fetch = DB::select(DB::raw("select * from `options` where `id` = $option_id and`question_id` = $question_id  and `is_correct_ans` = 1 limit 1;"));
        // if (count($rs_fetch) > 0) {
        //     $marks = 1;    
        // }else{
        //     $marks = 0;   
        // }
        // $status = 0;
        // $rs_save_ans = DB::select(DB::raw("insert into `user_question_answer`(`user_id`, `question_no`, `question_id`, `option_id`, `marks`, `status`) values($user_id, $question_no, $question_id, $option_id, $marks, $status);"));

        // $dt = Carbon::now();
        // $time = $dt->toDateTimeString();
        // $rs_update = DB::select(DB::raw("update `question_master` set `end_time` = $time where `user_id` = $user_id limit 1;")); 
        return Redirect()->back()->with(['message'=>'Save Successfully','class'=>'success']);  
        
    }

    public function endexam()
    {
        $user_id = Auth::guard('admin')->user()->id;
        $question_id = 0;
        $option_id = 0;
        $rs_store = DB::select(DB::raw("call `up_submit_answer`($user_id, $question_id, $option_id);"));
        return redirect('admin/dashboard');
        
    }
    public function reviewexam()
    {
        $user_id = Auth::guard('admin')->user()->id;  

        $rs_fetch = DB::select(DB::raw("select * from `quiz_questions` where `user_id` = $user_id order by `id` desc limit 1;"));
        $question_id = $rs_fetch[0]->question_id;
        $rs_questions = DB::select(DB::raw("select `id` as `q_id`, `details` as `q_detail` from `questions` where `id` = $question_id limit 1;"));
        
        
        return view('admin/dashboard/review_question',compact('rs_questions', 'user_id'));
    }  

    public function check_all_submit()
    {
        $user_id = Auth::guard('admin')->user()->id;  
        $rs_fetch = DB::select(DB::raw("select * from `default_value` limit 1;"));
        $question_no = $rs_fetch[0]->question_no;
        
        $rs_fetch = DB::select(DB::raw("call `up_check_for_all_user_submit`();"));
        $show_answer = $rs_fetch[0]->submit_status;
        if($show_answer == 0){
            $rs_questions = DB::select(DB::raw("select `id` as `q_id`, `details` as `q_detail` from `questions` where `status` = 1 order by `id` desc limit 1;"));    
        }else{
            $rs_questions = DB::select(DB::raw("select `id` as `q_id`, `details` as `q_detail` from `questions` where `status` = 2 order by `id` desc limit 1;"));
        }
        $max_min = 0;
        $max_sec = 0;
        $refresh_time = 2000;
        return view('admin/dashboard/dashboard_2', compact('rs_questions', 'max_min', 'max_sec', 'refresh_time', 'show_answer', 'question_no'));
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

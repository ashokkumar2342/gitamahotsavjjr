@extends('admin.layout.base')
@section('body')
<style type="text/css">
    #anima {
      
      color: red;
      animation-name: example;
      animation-duration: 4s;
    }

    @keyframes example {
      0%   {color: red;}
      25%  {color: yellow;}
      50%  {color: red;}
      100% {color: yellow;}
    }
</style>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><strong>Dashboard</strong></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><h1><strong style="color:red">Quiz Start To :: <span id="countdown"></span></strong></h1></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card card-info"> 
            <div class="card-body">
                @if ($admins->profile_status == 1)
                    <div class="row">
                        <div class="col-lg-12">
                            @php
                                $rs_update = DB::select(DB::raw("select * from `status_master` limit 1;"));
                            @endphp
                            @if ($rs_update[0]->status == 0)
                                <div class="col-xs-12 c-test-instructions ng-scope" ng-class="{'railway-test-interface':isRailwayTestInterfaceUsed}" ng-show="showInstTab == 1" id="bank-instructions" ng-if="!instructionsJSON.isGateExam">
                                    <h4>General Instructions:</h4>
                                    <ol start="1">
                                        <li>
                                            <div ng-if="!instructionsJSON.hasSkippableSections" class="col-xs-12 col-sm-6 ng-scope">
                                                <b translate="TESTINSTRUCTIONDURATION" translate-values="{instructionsJSON: instructionsJSON}" class="ng-scope">Duration: 15 Mins
                                                </b>
                                            </div>
                                            <div ng-if="!instructionsJSON.hasSkippableSections" class="col-xs-12 col-sm-6 ng-scope">
                                                <b class="pull-right ng-binding">Maximum Marks: 30
                                                </b>
                                            </div>
                                            <div class="col-xs-12 col-sm-12 di-content">
                                                <div ng-if="instructionsJSON.instructionsArr" class="ng-scope">
                                                    <p>
                                                        <b translate="" class="ng-scope">Read the following instructions carefully.
                                                        </b>
                                                    </p>
                                                    <ol start="1" ng-if="instructionsJSON &amp;&amp; instructionsJSON.instructionsArr.length > 1 &amp;&amp; !instructionsJSON.isSourceCP" class="for-all-exams ng-scope">
                                                        <li ng-repeat="ins in instructionsJSON.instructionsArr" class="ng-scope">
                                                            <p><span ng-bind-html="parseHtml(ins.value)" class="ng-binding">The test contains 15 questions.</span>
                                                            </p>
                                                        </li>
                                                        <li ng-repeat="ins in instructionsJSON.instructionsArr" class="ng-scope">
                                                            <p><span ng-bind-html="parseHtml(ins.value)" class="ng-binding">Each question has 4 options out of which only one is correct.</span>
                                                            </p>
                                                        </li>
                                                        <li ng-repeat="ins in instructionsJSON.instructionsArr" class="ng-scope">
                                                            <p><span ng-bind-html="parseHtml(ins.value)" class="ng-binding">You have to finish the test in 15 minutes.</span>
                                                            </p>
                                                        </li>
                                                        <li ng-repeat="ins in instructionsJSON.instructionsArr" class="ng-scope">
                                                            <p><span ng-bind-html="parseHtml(ins.value)" class="ng-binding">
                                                                <p>You will be awarded 2&nbsp;marks for each correct answer and There is no negative marking.
                                                                </p></span>
                                                            </p>
                                                        </li>
                                                        <li ng-repeat="ins in instructionsJSON.instructionsArr" class="ng-scope">
                                                            <p>
                                                                <span ng-bind-html="parseHtml(ins.value)" class="ng-binding">There is no penalty for the questions that you have not attempted.</span>
                                                            </p>
                                                        </li>
                                                        <li ng-repeat="ins in instructionsJSON.instructionsArr" class="ng-scope">
                                                            <p>
                                                                <span ng-bind-html="parseHtml(ins.value)" class="ng-binding">
                                                                    <p>Once you start the test, you will not be allowed to reattempt it. Make sure that you complete the test&nbsp;before you submit the test&nbsp;and/or close the browser.</p>
                                                                </span>
                                                            </p>
                                                        </li>
                                                    </ol>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                </div>
                @elseif($rs_update[0]->status == 1)
                    <div class="col-lg-12 text-center" id="anima">
                        <h2 >Ready To Start</h2>
                    </div>
                @elseif($rs_update[0]->status == 2)
                    <a href="{{ route('admin.start.exam') }}" title=""><button id="btn_click_by_start_exam" class="btn btn-success">Start Exam</button></a>
                @elseif($rs_update[0]->status == 3)
                    <a href="{{ route('admin.review.exam') }}" title=""><button id="btn_click_by_start_exam" class="btn btn-success">review</button></a>
                @endif
                @else 
                    <form action="{{ route('user.profile.update') }}" method="post" class="add_form" button-click="btn_profile_show" redirect-to="{{ route('admin.dashboard') }}" autocomplete="off">
                        {{ csrf_field()}}
                        <div class="form-body overflow-hide">
                            <div class="form-group">
                                <label class="control-label mb-10">Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="icon-lock"></i></div>
                                    <input type="text" class="form-control" name="name" placeholder="Enter Name" required="">
                                </div>
                            </div> 
                            <div class="form-group">
                                <label class="control-label mb-10" for="exampleInputpwd_01">Email</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="icon-lock"></i></div>
                                    <input type="text" name="email" class="form-control" placeholder="Enter Email" required>
                                </div>
                            </div>
                            <div class="form-group">
                              <label for="exampleInputFile">Upload Image</label>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" name="image" class="custom-file-input" id="exampleInputFile" accept="image/*">
                                  <label class="custom-file-label" for="exampleInputFile">Choose File</label>
                                </div> 
                              </div>
                            </div>
                        </div>
                        <div class="form-actions mt-10">            
                            <button type="submit" class="btn btn-success mr-10 mb-30">Update Profile</button>
                        </div>              
                    </form>
                @endif
            </div> 
        </div>        
</section>
@endsection 
@push('scripts')
<script type="text/javascript">
    $(function () {
        bsCustomFileInput.init();
    });
</script>
<script>
        // Set the target date and time for the countdown
        const targetDate = new Date("{{$quiz_start_time}}").getTime();

        // Update the countdown every second
        const countdownInterval = setInterval(updateCountdown, 1000);

        function updateCountdown() {
            const currentDate = new Date().getTime();
            const timeRemaining = targetDate - currentDate;

            if (timeRemaining > 0) {
                const days = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                document.getElementById("countdown").innerHTML = `${hours}h ${minutes}m ${seconds}s`;
                if(hours == 0 && minutes == 0 && seconds == 2){
                    location.reload();
                }
            } else {
                clearInterval(countdownInterval);
                document.getElementById("countdown").innerHTML = "Countdown expired!";

                setTimeout(function(){  
                    location.reload();  
                },{{$refresh_timing}});
            }
        }
    </script>
@endpush
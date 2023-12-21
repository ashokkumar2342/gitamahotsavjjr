<html>
<head>
  <title>Quiz Review</title>
  <link rel="stylesheet" href="{{ asset('admin_asset/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin_asset/dist/css/font-awesome.min.css')}}">
  
  
</head>
<body>
  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"><b style="color: #fff;">GITA MAHOTSAV JHAJJAR</b></a>
      </div>
      
    </div>
  </nav>
  <div class="box">    
    
      <div class="container" style="height: 500px;"> 
        
        <div class="">
            

          
            <div class="case-content">
              @php
                $count =1;
              @endphp
              @foreach ($questions as $question)
                <div>
                  <div style="display: inline-block">
                    <b>{{ $count }}. <span style="display: inline-block;">{!! $question->details !!} </span></b>
                  </div>
                  
                   <ol type="a"> 
                   <div id="question_{{ $question->id }}">
                      @foreach ($question->options as $option)
                        @php


                        if(App\Model\Exam\UserQuestionAnswer::where(['user_id'=>$user_id,'question_id'=>$question->id,'option_id'=>$option->id])->count() >0){
                          
                          if ($option->is_correct_ans==1) {
                              $checked='checked';
                          }

                        }else{
                          $checked='';
                        }
                        @endphp
                        @if (App\Model\Exam\UserQuestionAnswer::where(['user_id'=>$user_id,'question_id'=>$question->id,'option_id'=>$option->id])->count() >0)
                            @if ($option->is_correct_ans==1)
                              <div class="radio">
                                <li style="background-color: #b5eab5">{!! $option->description !!}</li>
                            </div>
                            @else
                              <div class="radio">
                                  <li style="background-color: #f38a8a;">{!! $option->description !!}</li>
                              </div>
                            @endif
                          
                        @elseif(App\Model\Exam\UserQuestionAnswer::where(['user_id'=>$user_id,'question_id'=>$question->id,'option_id'=>$option->id])->count() ==0 && $option->is_correct_ans==1) 
                            <div class="radio">
                                <li style="background-color: #f1d572">{!! $option->description !!}</li>
                            </div>
                         
                        @else
                          <div class="radio">
                              <li>{!! $option->description !!}</li>
                          </div>
                        @endif
                          
                          
                      @endforeach 
                              
                    </div>     
                   
                   </ol>  
              
              </div>
              
              @php
                $count++;
              @endphp
              @endforeach
            </div>
            <a href="{{ route('admin.dashboard') }}" title="Back" class="btn btn-success">Back</a>
          
        </div>
        
                
      </div> 
        
  </div> 

  
  <script src="{{ asset('admin_asset/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="{{ asset('admin_asset/bootstrap/js/bootstrap.min.js') }}"></script>
  <!-- SlimScroll -->
  <script src="{{ asset('admin_asset/dist/js/toastr.min.js') }}"></script>
  <script src={!! asset('admin_asset/dist/js/validation/common.js?ver=1') !!}></script>
  <script src={!! asset('admin_asset/dist/js/customscript.js?ver=1') !!}></script>
  <script src={!! asset('admin_asset/dist/js/summernote.js?ver=1') !!}></script>
  <script type="text/javascript">
    
  </script> 
  <!-- Modal -->
  <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Finish Confirmation </h4>
        </div>
        <div class="modal-body">
          <div class="col-lg-12" style="margin-left: 20px;">
            <input type="checkbox"  name="finish" id="finish">
            <label for="">i am sure exiting quiz.</label>
            
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-success" onclick="finish($('#finish').val())">Submit</button>
        </div>
      </div>

    </div>
  </div>
</body>
</html>



        
       



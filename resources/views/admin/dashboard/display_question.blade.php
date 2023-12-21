<html>
<head>
  <title>Quiz Starting</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('admin_asset/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('admin_asset/dist/css/font-awesome.min.css')}}">
  <style type="text/css" media="screen">
    body {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    }
    h2 {
      color: black;
      text-align: center;
    }

    .center {
      text-align: center;
    }

    .caseform {
      background: rgba(19, 35, 47, 1);
      padding: 20px;
      max-width: 90%;
      height: 100px;
      margin: 40px auto;
      border-radius: 40px;
      box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
    }

    .case-content>div {
      display: none;
    }

    .case-content>div:first-child {
      display: block;
    }

    .pagination a {
      display: inline-block;
      text-decoration: none;
      padding: 12px;
      background: black;
      color: #fff;
      font-size: 15px;
      -webkit-transition: .5s ease;
      transition: .5s ease;
    }

    .pagination a.active {
      background: #CE0101;
      color: #ffffff;
    }

    .pagination a:hover:not(.active) {
      background-color: #473e3e;
    }
    input[type=checkbox], .checkbox-inline input[type=checkbox], .radio input[type=radio], .radio-inline input[type=radio] {
        position: absolute;
        margin-top: 4px\9;
        margin-left: -37px;
    }
    p{
      font-size: 15;
      font-weight: 800;
    }
    li{
      font-size: 15;
      font-weight: 800;
    }  
    hr {
        margin-top: 20px;
        margin-bottom: 20px;
        border: 0;
        border-top: 1px solid #c7c7c7;
    }  
    #my_test::backdrop {
        background-color: rgba(255,255,255,0);
    }

  </style>
  
</head>
<body id="my_test">
  {{-- <button onclick="openFullscreen();" id="full" class="hidden">Start</button> --}}
  <nav class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="#"><b style="color: #fff;">GITA MAHOTSAV JHAJJAR</b></a>
      </div>
      <ul class="nav navbar-nav">
        {{-- <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Page 1</a></li>
        <li><a href="#">Page 2</a></li> --}}
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><b style="color: #fff;"><span class="glyphicon glyphicon-time"></span> <span id="timerText">--:--</span> Remaining</a></b></li>
      </ul>
    </div>
  </nav>
  <div class="box">    
    
      <div class="container" style="height: 500px;"> 
        
        <div class="">
            <div class="pagination center">
              <a id="prev" href="#" class="hidden">previous</a>
              @php
                $count =1;
                
              @endphp
              @foreach ($rs_questions as $question)
              <a class="tab {{ $count==1?'active':'' }}" href="#step{{ $count }}">{{ $count }}</a>
              @php
                $count++;
              @endphp
              @endforeach
              <a id="next" href="#" class="hidden">Next</a>
            </div>
            <hr>

          <form action="#" method="post" autocomplete="off">
            <div class="case-content">
              @php
                $count =1;
              @endphp
              @foreach ($rs_questions as $question)
              @php
                  $rs_options = Illuminate\Support\Facades\DB::select(DB::raw("select * from `options` where `question_id` = $question->id ;"));
              @endphp
                <div id="step{{ $count }}">
                  <div style="display: inline-block">
                    <b>{{ $count }}. <span style="display: inline-block;">{!! $question->details !!} </span></b>
                  </div>
                  
                   <ol type="a"> 
                   <div id="question_{{ $question->id }}">
                      @foreach ($rs_options as $option)
                        @php
                        if(App\Model\Exam\UserQuestionAnswer::where(['user_id'=>$user_id,'question_id'=>$question->id,'option_id'=>$option->id])->count() >0){
                          $checked='checked';
                        }else{
                          $checked='';
                        }
                        @endphp
                          <div class="radio"> 
                            
                              <input type="radio" {{ $checked }} name="radio_{{ $question->id }}" id="option_{{ $option->id }}"  value="{{ $count }}_{{ $question->id }}_{{ $option->id }}">  
                              <li>{!! $option->description !!}</li>
                          </div>
                          
                      @endforeach 
                          <div class="radio"> 
                              <input type="radio" class="hidden"  name="radio_{{ $question->id }}" id="radio_{{ $question->id }}"  value="">  
                              
                          </div>    
                    </div>     
                   
                   </ol>  
                <!-- some input text fields -->
                <div class="">
                  <a class="btn btn-success" button-click="next" onclick="callAjax(this,'{{ route('admin.student.answer.store') }}'+'?id='+$('input[name='+'radio_{{ $question->id }}'+']:checked').val()+'&status=2')">Save</a>
                  <a class="btn btn-warning" button-click="next" onclick="callAjax(this,'{{ route('admin.student.answer.store') }}'+'?id='+$('input[name='+'radio_{{ $question->id }}'+']:checked').val()+'&status=1')">Mark For Review</a>
                  <a class="btn btn-danger" button-click="next" onclick="$('#radio_{{ $question->id }}').prop('checked', true);$('#next').click()">Mark Unattempt</a>
                  <a class="btn btn-primary" onclick="$('#next').click()">Next</a>
                  <a class="btn btn-primary" onclick="$('#prev').click()">Previous</a>
                  <a class="btn btn-success" data-toggle="modal" data-target="#myModal">Finish</a>
                  
                </div>
              </div>
              
              @php
                $count++;
              @endphp
              @endforeach
            </div>
            <!-- case-content -->
          </form>
          
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
    // var elem = document.getElementById("my_test");
    // // document.getElementById("full").click()

    // /* Function to open fullscreen mode */
    // function openFullscreen() {
    //   if (elem.requestFullscreen) {
    //     elem.requestFullscreen();
    //   } else if (elem.webkitRequestFullscreen) { /* Safari */
    //     elem.webkitRequestFullscreen();
    //   } else if (elem.msRequestFullscreen) { /* IE11 */
    //     elem.msRequestFullscreen();
    //   }
    // }
    $(document).ready(function() {

      var pageItem = $(".pagination a").not("#prev, #next");

      pageItem.click(function() {
        pageItem.removeClass("active");
        $(this).not("#prev, #next").addClass("active");

        target = $(this).attr('href');
        $('.case-content > div').not(target).hide();
        $(target).fadeIn(600);
      });

      $("#prev").click(function() {
        $('a.active').removeClass('active').prev().addClass('active');
        if ($(this).hasClass("active"))
          $(this).removeClass('active').next().addClass('active');
        if ($(".case-content div:visible").prev().length != 0)
          $(".case-content > div:visible").prev().fadeIn(600).next().hide();
        return false;
      });

      $("#next").click(function() {
        $('a.active').removeClass('active').next().addClass('active');
        if ($(this).hasClass("active"))
          // change below to next() if you want to put the brackets on the left
          $(this).removeClass('active').prev().addClass('active');
        if ($(".case-content div:visible").next().length != 0)
          $(".case-content > div:visible").next().fadeIn(600).prev().hide();
        return false;
      });

    });
    function endexam(){
      window.location.replace('{{ route('admin.end.exam') }}')
    }

    function finish(){
      if($("#finish").prop('checked') == true){
        endexam()
      }else{
        alert('Please checked ! i am sure exiting quiz.')
      }
     
    }
    $(function () {
        // Config
        var mins = {{ 1 }}; // Min test time
        var secs = {{ 0 }}; // Seconds (In addition to min) test time
        var timerDisplay = $('#timerText');

        //Globals: 
        var timeExpired = false;

        // Test time in seconds
        var totalTime = secs + (mins * 60);

        // This sourced from: http://stackoverflow.com/questions/532553/javascript-countdown
        var countDown = function (callback) {
            var interval;
            interval = setInterval(function () {
                if (secs === 0) {
                    if (mins === 0) {
                        timerDisplay.text('0:00');
                        clearInterval(interval);
                        callback();
                        return;
                    } else {
                        mins--;
                        secs = 60;
                    }
                }
                var minute_text;
                if (mins > 0) {
                    minute_text = mins;
                } else {
                    minute_text = '0';
                }
                var second_text = secs < 10 ? ('0' + secs) : secs;

                timerDisplay.text(minute_text + ':' + second_text);
                secs--;
            }, 1000, timeUp);
        };

        // When time elapses: submit form
        var timeUp = function () {
            alert("Time's Up!");
            timeExpired = true;
           endexam()
        };

        // Start the clock
        countDown(timeUp);

        $('#myquiz').submit(function () {
            // User time still yet to elapse and form was submitted by user: check if all questions were answered
            if (!timeExpired) {
                var errors = [];
                $('.content_question').each(function () {

                    var answer = $(this).next();
                    var inputs = answer.find('input[type=radio], input[type=checkbox]');

                    if (inputs.length > 0) {
                        var groupChecked = false;

                        inputs.each(function () {
                            if ($(this).is(':checked')) {
                                groupChecked = true;
                            }
                        });

                        if (!groupChecked) {
                            errors.push($(this).text().trim());
                        }
                    }
                });
                if (errors.length > 0) {
                    var errorMessage = "You forgot to attempt " + errors.length + " questions: \n\n";

                    for (var i = 0; i < errors.length; i++) {
                        errorMessage += errors[i] + "\n";
                    }
                    //alert(errorMessage);
                    //return false;
                    return confirm(errorMessage + " \n\n Click 'Cancel' to return or 'OK' to end the test.");
                }
            } else {
                // Continue submit
                return true;
            }
        });
    });
    function preventBack(){window.history.forward();}
        setTimeout("preventBack()", 0);
        window.onunload=function(){null};
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



        
       



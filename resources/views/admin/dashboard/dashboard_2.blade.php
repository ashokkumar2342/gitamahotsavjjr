@extends('admin.layout.base')
@section('body')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark"><strong>Dashboard</strong></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item active"><h1><strong style="color:red"><span id="timerText">--:--</span> Remaining</strong></h1></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="card card-info"> 
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">
                            <div class="mt-5">
                                <span>Question 1</span>
                                @foreach ($rs_questions as $question)
                                @php
                                    $rs_options = Illuminate\Support\Facades\DB::select(DB::raw("select * from `options` where `question_id` = $question->q_id ;"));
                                @endphp
                                <h3 class="mb-3 mt-1">{!! $question->q_detail !!}</h3>
                                <input type="hidden" name="question_id" value="{{$question->q_id}}">
                                <div class="list-group">
                                    @foreach ($rs_options as $option)
                                    <div class="list-group-item list-group-item-action " aria-current="true">
                                        <div class="form-check">
                                            <label class="form-check-label stretched-link" for="flexRadioDefault1">
                                                {!! $option->description !!}
                                            </label>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @if ($show_answer == 1)
                        <div class="col-lg-12">
                            <a href="{{ route('admin.show.answer') }}" title=""><button type="" class="btn btn-success">Show Answer</button></a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 
@push('scripts')
<script>

   $(function () {
   // Config
   var mins = {{ $max_min }}; // Min test time
   var secs = {{ $max_sec }}; // Seconds (In addition to min) test time
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
       // alert("Time's Up!");
       timeExpired = true;
       check_all_submit();

   };

   // Start the clock
   countDown(timeUp);
   });

   function check_all_submit(){
        window.location.replace('{{ route('admin.check.all.submit') }}')
    }
</script>
<script>
    
    setTimeout(function(){  
        location.reload();  
    },{{($max_min*60+$max_sec)*1000 + $refresh_time}});
    
</script>
@endpush
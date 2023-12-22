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
                <div class="row">
                    <div class="col-lg-12">
                        @php
                            $rs_update = DB::select(DB::raw("select * from `status_master` limit 1;"));
                        @endphp
                        @if ($rs_update[0]->status == 0)
                            <a  href="{{ route('admin.start.quiz') }}" title=""><button type="" class="btn btn-success" id="start_quiz">Start Quiz</button></a>
                        @elseif($rs_update[0]->status == 1)
                            <a href="{{ route('admin.send.question') }}" title=""><button type="" class="btn btn-success">Send Question</button></a>
                        @elseif($rs_update[0]->status == 2)
                            {{-- <div class="card-body">
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
                            </div> --}}
                            @if ($show_ans_status == 1)
                                <a href="{{ route('admin.show.answer') }}" title=""><button type="" class="btn btn-success">Show Answer</button></a>
                            @endif
                        @elseif($rs_update[0]->status == 3)
                            <a href="{{ route('admin.show.score.board') }}" title=""><button type="" class="btn btn-success">Show Score Board</button></a>
                        @elseif($rs_update[0]->status == 4)
                            <a href="#" title=""><button type="" class="btn btn-success">End Quiz</button></a>
                        @endif
                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 
@push('scripts')
<script type="text/javascript">
    
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
                // alert(seconds);
                if(hours == 0 && minutes == 0 && seconds == 2){
                    $('#start_quiz').click();
                }
            }
            else {
                clearInterval(countdownInterval);
                document.getElementById("countdown").innerHTML = "Countdown expired!";

                setTimeout(function(){  
                    location.reload();  
                },5000000);
            }
        }
    </script>

    <script>
        // function playAudioWithSettings(source, duration) {
        //     var audioPlayer = new Audio(source);

        //     // Play the audio
        //     audioPlayer.play();

        //     // Stop the audio after the specified duration
        //     setTimeout(function() {
        //         audioPlayer.pause();
        //     }, duration * 1000); // Convert seconds to milliseconds
        // }

        // // Call the function with dynamic settings
        // window.onload = function() {
        //     // Example: Play audio.mp3 for 60 seconds
        //     playAudioWithSettings("{{ asset('quiz/audio/clock.aac') }}", 60);
        // };
    </script>
@endpush
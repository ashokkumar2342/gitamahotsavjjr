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
                        @include('admin.dashboard.rules_regulation')
                    </div>
                    <div class="col-lg-12">
                        <a  href="{{ route('admin.start.quiz') }}" title=""><button type="" class="btn btn-success" id="start_quiz">Start Quiz</button></a>
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
@endpush
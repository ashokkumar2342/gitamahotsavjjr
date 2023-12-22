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
    <nav class="navbar navbar-inverse">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><b style="color: #fff;">GITA MAHOTSAV JHAJJAR</b></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                {{-- <li><a href="#"><b style="color: #fff;"><span class="glyphicon glyphicon-time"></span> <span id="timerText">--:--</span> Remaining</a></b></li> --}}
            </ul>
        </div>
    </nav>
<div class="box">
    <div class="container" style="height: 300px;">
        <div class="card-body">
            
                <div class="mt-5">
                    @php
                        $question_no = App\Helper\MyFuncs::question_no();
                    @endphp
                    <span>Question No. :: {{$question_no}}</span>
                    @foreach ($rs_questions as $question)
                    @php
                        $rs_options = Illuminate\Support\Facades\DB::select(DB::raw("select * from `options` where `question_id` = $question->q_id ;"));
                    @endphp
                    <h3 class="mb-3 mt-1">{!! $question->q_detail !!}</h3>
                    <input type="hidden" name="question_id" value="{{$question->q_id}}">
                    <div class="list-group">
                        @foreach ($rs_options as $option)
                            @php
                                $rs_fetch = DB::select(DB::raw("select * from `quiz_questions` where `user_id` = $user_id order by `id` desc limit 1;"));
                                if ($option->is_correct_ans == 1) {
                                    $color = 'green';
                                }elseif($rs_fetch[0]->given_answer == $option->id && $option->is_correct_ans == 1){
                                    $color = 'green';
                                }elseif($rs_fetch[0]->given_answer == $option->id){
                                    $color = 'red';
                                }else{
                                    $color = '';
                                }
                            @endphp
                        <div class="list-group-item list-group-item-action " aria-current="true" style="background-color:{{$color}}">
                            <div class="form-check">
                                {{-- <input class="form-check-input" type="radio" name="option_id" id="flexRadioDefault1" value="{{$option->id}}"> --}}
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

<script>
    setTimeout(function(){  
        location.reload();  
    },5000);
</script> 
</body>
</html>
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
                    <li class="breadcrumb-item active"><h1><strong style="color:red"></strong></h1></li>
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
                                            if ($option->is_correct_ans == 1) {
                                                $color = 'green';
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
                    <div class="col-lg-12">
                        <a href="{{ route('admin.show.score.board') }}" title=""><button type="" class="btn btn-success">Show Score Board</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 
@push('scripts')

@endpush
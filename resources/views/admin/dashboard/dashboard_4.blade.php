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
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            @if (count($rs_score)>0)
                <div class="col-lg-4">
                    <div class="col-lg-12 text-center">
                        <label style="color:green;">First Rank</label>   
                    </div>
                    <div class="card card-success card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ route('admin.profile.photo.show',Crypt::encrypt($rs_score[0]->profile)) }}" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{$rs_score[0]->name}}</h3>
                            <p class="text-muted text-center">{{$rs_score[0]->mobile}}</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Total Score</b> <a class="float-right">{{$rs_score[0]->score}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
                
            @if (count($rs_score)>1)
                <div class="col-lg-4">
                    <div class="col-lg-12 text-center">
                        <label style="color:green;">Second Rank</label>   
                    </div>
                    <div class="card card-success card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ route('admin.profile.photo.show',Crypt::encrypt($rs_score[1]->profile)) }}" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{$rs_score[1]->name}}</h3>
                            <p class="text-muted text-center">{{$rs_score[1]->mobile}}</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Total Score</b> <a class="float-right">{{$rs_score[1]->score}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
                
            @if (count($rs_score)>2)
                <div class="col-lg-4">
                    <div class="col-lg-12 text-center">
                        <label style="color:green;">Third Rank</label>   
                    </div>
                    <div class="card card-success card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="{{ route('admin.profile.photo.show',Crypt::encrypt($rs_score[2]->profile)) }}" alt="User profile picture">
                            </div>
                            <h3 class="profile-username text-center">{{$rs_score[2]->name}}</h3>
                            <p class="text-muted text-center">{{$rs_score[2]->mobile}}</p>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Total Score</b> <a class="float-right">{{$rs_score[2]->score}}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            @if ($end_quiz == 0)
                <div class="col-lg-12">
                    <a href="{{ route('admin.send.next.question') }}" title=""><button type="" class="btn btn-success">Send Next Question</button></a>
                </div>            
            @else
                <div class="col-lg-12">
                    <a href="{{ route('admin.send.next.question') }}" title=""><button type="" class="btn btn-success">End Quiz</button></a>
                </div>
            @endif
                
        </div>
    </div>
</section>

@endsection 
@push('scripts')

@endpush
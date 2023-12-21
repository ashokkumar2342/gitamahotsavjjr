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
                    <li class="breadcrumb-item"><a href="#"><strong>Home</strong></a></li>
                    <li class="breadcrumb-item active"><strong>Dashboard</strong></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4">
                <div class="col-lg-12 text-center">
                    <label style="color:green;">First Rank</label>   
                </div>
                @php
                $admins = Auth::guard('admin')->user();
                @endphp
                <div class="card card-success card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ route('admin.profile.photo.show',Crypt::encrypt($admins->profile)) }}" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">Nina Mcintire</h3>
                        <p class="text-muted text-center">Software Engineer</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Total Question</b> <a class="float-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Correct Question</b> <a class="float-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Rank Position</b> <a class="float-right">13,287</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="col-lg-12 text-center">
                    <label style="color:#ffc107;">Second Rank</label>   
                </div>
                @php
                $admins = Auth::guard('admin')->user();
                @endphp
                <div class="card card-warning card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ route('admin.profile.photo.show',Crypt::encrypt($admins->profile)) }}" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">Nina Mcintire</h3>
                        <p class="text-muted text-center">Software Engineer</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Total Question</b> <a class="float-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Correct Question</b> <a class="float-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Rank Position</b> <a class="float-right">13,287</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="col-lg-12 text-center">
                    <label style="color:Red">Third Rank</label>   
                </div>
                @php
                $admins = Auth::guard('admin')->user();
                @endphp
                <div class="card card-danger card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle" src="{{ route('admin.profile.photo.show',Crypt::encrypt($admins->profile)) }}" alt="User profile picture">
                        </div>
                        <h3 class="profile-username text-center">Nina Mcintire</h3>
                        <p class="text-muted text-center">Software Engineer</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>Total Question</b> <a class="float-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Correct Question</b> <a class="float-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Rank Position</b> <a class="float-right">13,287</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection 
@push('scripts')
{{-- <script type="text/javascript"> 
    $(document).ready(function () { 
      setTimeout(function () { 
        alert('Reloading Page'); 
        location.reload(true); 
      }, 5000); 
    }); 
  </script> --}}
@endpush
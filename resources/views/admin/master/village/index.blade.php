@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Add Village</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="{{ route('admin.Master.village.store') }}" method="post" class="add_form" select-triger="gram_panchayat" no-reset="true" reset-input-text="code,name">
                {{ csrf_field() }}
                    <div class="row">
                        <div class="col-lg-3 form-group"> 
                            <label for="exampleInputEmail1">States</label>
                            <span class="fa fa-asterisk"></span>
                            <select name="states" id="state_select_box" class="form-control" onchange="callAjax(this,'{{ route('admin.Master.stateWiseDistrict') }}','district_select_box')">
                                <option selected disabled>Select States</option>
                                @foreach ($States as $State)
                                <option value="{{ $State->id }}">{{ $State->code }}--{{ $State->name }}</option>  
                                @endforeach
                            </select>
                        </div>
                        <div class="col-lg-3 form-group">
                            <label for="exampleInputEmail1">District</label>
                            <span class="fa fa-asterisk"></span>
                            <select name="district" class="form-control" id="district_select_box" onchange="callAjax(this,'{{ route('admin.Master.DistrictWiseBlock') }}','block_select_box')">
                                <option selected disabled>Select District</option>
                            </select>
                        </div>
                        <div class="col-lg-3 form-group">
                            <label for="exampleInputEmail1">Block MCS</label>
                            <span class="fa fa-asterisk"></span>
                            <select name="block_mc" class="form-control" id="block_select_box"  onchange="callAjax(this,'{{ route('admin.Master.BlockWiseGramPanchayat') }}','gram_panchayat')">
                                <option selected disabled>Select Block MCS</option>
                                 
                            </select>
                        </div>
                        <div class="col-lg-3 form-group">
                            <label for="exampleInputEmail1">Gram Panchayat</label>
                            <span class="fa fa-asterisk"></span>
                            <select name="gram_panchayat" class="form-control" id="gram_panchayat" data-table="district_table" onchange="callAjax(this,'{{ route('admin.Master.villageTable') }}','village_table')">
                                <option selected disabled>Select Gram Panchayat</option>
                                 
                            </select>
                        </div> 
                        <div class="col-lg-6 form-group">
                            <label for="exampleInputEmail1">Village Code</label>
                            <span class="fa fa-asterisk"></span>
                            <input type="text" name="code" id="code" class="form-control" placeholder="Enter Code" maxlength="5">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="exampleInputPassword1">Village Name</label>
                            <span class="fa fa-asterisk"></span>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name" maxlength="50">
                        </div>     
                    </div> 
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary form-control">Submit</button>
                    </div>
                </form> 
            </div>
        </div>
        <div class="card card-info"> 
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 table-responsive" id="village_table"> 
                        <table id="district_table" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">States</th>
                                    <th class="text-nowrap">District</th>
                                    <th class="text-nowrap">Block MCS</th>
                                    <th class="text-nowrap">Gram Panchayat</th>
                                    <th class="text-nowrap">Village Code</th>
                                    <th class="text-nowrap">Village Name</th> 
                                    <th class="text-nowrap">Action</th>

                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table> 
                    </div> 
                </div>
            </div> 
        </div> 
    </section>
    @endsection
    @push('scripts')
    <script type="text/javascript"> 
        $('#district_table').DataTable();
    </script> 
  @endpush  


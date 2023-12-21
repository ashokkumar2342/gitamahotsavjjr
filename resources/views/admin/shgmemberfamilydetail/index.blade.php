@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>SHG Member Family Detail</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12"> 
                        <div class="row">  
                            <div class="col-lg-3 form-group">
                                <label for="exampleInputEmail1">District</label>
                                <span class="fa fa-asterisk"></span>
                                <select name="district" class="form-control" id="district_select_box" onchange="callAjax(this,'{{ route('admin.Master.DistrictWiseBlock') }}','block_select_box')">
                                    <option selected disabled>Select District</option>
                                    @foreach($districts as $district)
                                    <option value="{{$district->id}}">{{$district->name}}</option>
                                    @endforeach
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
                                <select name="gram_panchayat" class="form-control" id="gram_panchayat" data-table="district_table" onchange="callAjax(this,'{{ route('admin.Master.GramPanchayatWiseVillage') }}','village_select_box')">
                                    <option selected disabled>Select Gram Panchayat</option> 
                                </select>
                            </div>
                            <div class="col-lg-3 form-group">
                                <label for="exampleInputEmail1">Village</label>
                                <span class="fa fa-asterisk"></span>
                                <select name="village" class="form-control" id="village_select_box"  onchange="callAjax(this,'{{ route('admin.Master.villageWiseShg') }}','shg_select_box')">
                                    <option selected disabled>Select Village</option> 
                                </select>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label for="exampleInputEmail1">SHG Details</label>
                                <span class="fa fa-asterisk"></span>
                                <select name="shg_id" class="form-control" id="shg_select_box" onchange="callAjax(this,'{{ route('admin.Master.shgWiseMember') }}','member_select_box')">
                                    <option selected disabled>Select SHG</option> 
                                </select>
                            </div>
                            <div class="col-lg-6 form-group">
                                <label for="exampleInputEmail1">SHG Member Detail</label>
                                <span class="fa fa-asterisk"></span>
                                <select name="shg_id" class="form-control" id="member_select_box" onchange="callAjax(this,'{{ route('admin.shgmemberfamilytable') }}','member_family_table')">
                                    <option selected disabled>Select SHG Member</option> 
                                </select>
                            </div>
                        </div>
                    </div> 
                    <div class="col-lg-12" id="member_family_table"> 
                    </div>
                </div> 
            </div> 
        </section>
        @endsection
        @push('scripts')
        <script type="text/javascript"> 
            $('#btn_click_by_form').click();
        </script> 
        @endpush  


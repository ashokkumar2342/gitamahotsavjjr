@extends('admin.layout.base')
@push('links')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css">    
@endpush
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>SHG  Member With Family List</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body"> 
                <form action="{{ route('admin.report.shgMemberfamily.generate') }}"method="post" class="add_form" success-content-id="result_table" data-table-without-pagination="result_datatable" no-reset="true">
                    {{ csrf_field() }} 
                    <div class="row"> 
                        <div class="col-lg-3 form-group">
                            <label for="exampleInputEmail1">District</label>
                            <span class="fa fa-asterisk"></span>
                            <select name="district" class="form-control" id="district_select_box" onchange="callAjax(this,'{{ route('admin.Master.DistrictWiseBlock') }}','block_select_box')" required>
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
                            <select name="village" class="form-control" id="village_select_box" data-table="self_group">
                                <option selected disabled>Select Village</option>
                            </select>
                        </div> 
                    </div> 
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-primary">Generate</button>
                    </div>
                </form>
                <div id="result_table" style="margin-top:10px">
                    
                </div> 
            </div> 
        </div> 
    </div> 
</section>
@endsection
@push('scripts')
<script type="text/javascript">
</script> 
<script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js">
    @endpush


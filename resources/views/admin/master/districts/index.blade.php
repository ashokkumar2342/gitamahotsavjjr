@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Add Districts</h3>
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
                        <form action="{{ route('admin.Master.districtsStore') }}" method="post" class="add_form"  no-reset="true" reset-input-text="code,name_english,zp_ward,name_local_language" select-triger="state_select_box">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-lg-4 form-group">
                                <label for="exampleInputEmail1">States</label>
                                <span class="fa fa-asterisk"></span>
                                <select name="states" class="form-control" id="state_select_box" data-table="district_datatable" onchange="callAjax(this,'{{ route('admin.Master.DistrictsTable') }}','district_table')">    
                                    <option selected disabled>Select State</option>                                      
                                    @foreach ($States as $State)
                                    <option value="{{ $State->id }}">{{ $State->code }}--{{ $State->name }}</option>  
                                    @endforeach
                                </select>
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label for="exampleInputEmail1">Districts Code</label>
                                    <span class="fa fa-asterisk"></span>
                                    <input type="text" name="code" id="code" class="form-control" placeholder="Enter Code"maxlength="5">
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label for="exampleInputPassword1">Districts Name</label>
                                    <span class="fa fa-asterisk"></span>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Name (English)" maxlength="50">
                                </div>
                            </div> 
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary form-control">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
        <div class="card card-info">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-12 table-responsive" id="district_table"> 
                         <table id="district_datatable" class="table table-striped table-hover table-bordered">
                             <thead>
                                 <tr>
                                     <th>States</th>
                                     <th>Districts Code</th>
                                     <th>Districts Name</th>
                                     <th>Action</th>
                                      
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
        $('#district_datatable').DataTable();
    </script>
    @endpush 


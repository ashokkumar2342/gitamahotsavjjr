@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>SHG Cashbook</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
            <form action="{{ route('admin.shg.cashbook.store') }}" method="post" class="add_form" no-reset="true" select-triger="shg_select_box" reset-input-text="transaction_type_select_box,debit,credit,ondate">
            {{ csrf_field() }}
                <div class="row">
                    <div class="col-lg-6 form-group">
                        <label for="exampleInputEmail1">SHG Details</label>
                        <span class="fa fa-asterisk"></span>
                        <select name="shg_id" class="form-control" id="shg_select_box" onchange="callAjax(this,'{{route('admin.shg.cashbook.table')}}','cashbook_table')">
                            <option selected disabled>Select SHG</option>
                            @foreach ($shgdetails as $shgdetail)
                            <option value="{{ $shgdetail->id }}">{{ $shgdetail->group_name }}--{{ $shgdetail->shg_code }}</option>  
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-6 form-group">
                        <label for="exampleInputEmail1">Transaction Type</label>
                        <span class="fa fa-asterisk"></span>
                        <select name="transaction_type" class="form-control" id="transaction_type_select_box">
                            <option selected disabled>Select Transaction</option>
                            @foreach ($transactionTypes as $transactionType)
                            <option value="{{ $transactionType->id }}">{{ $transactionType->name }}</option>  
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Debit Amount</label>
                        <input type="text" name="debit" id="debit" class="form-control" maxlength="7" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter Debit Amount">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">Credit Amount</label>
                        <input type="text" name="credit" id="credit" class="form-control" maxlength="7" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Enter Credit Amount">
                    </div>
                    <div class="col-lg-4 form-group">
                        <label for="exampleInputEmail1">On Date</label>
                        <input type="date" name="ondate" id="ondate" class="form-control">
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
            <div class="col-lg-12 table-responsive" id="cashbook_table">
                
            </div> 
            </div>
        </div>
    </div> 
</section>
@endsection
@push('scripts')
    
@endpush  


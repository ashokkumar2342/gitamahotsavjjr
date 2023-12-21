@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>Transaction Type</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
                <form action="{{ route('admin.Master.transaction.type.store') }}" method="post" class="add_form" content-refresh="Transaction_Type_table">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="exampleInputEmail1">Transaction Type</label>
                            <span class="fa fa-asterisk"></span>
                            <input type="text" name="name" class="form-control" placeholder="Enter Transaction Type" maxlength="50">
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
                    <div class="col-lg-12 table-responsive"> 
                         <table id="Transaction_Type_table" class="table table-striped table-bordered">
                             <thead>
                                 <tr>
                                     <th>Transaction Type</th> 
                                     <th>Action</th>
                                      
                                 </tr>
                             </thead>
                             <tbody>
                                @foreach ($transactionTypes as $transactionType)
                                 <tr>
                                     
                                    <td>{{ $transactionType->name }}</td>
                                    <td class="text-nowrap">
                                        <a type="button" onclick="callPopupLarge(this,'{{ route('admin.Master.transaction.type.edit',Crypt::encrypt($transactionType->id)) }}')" title="" class="btn btn-primary btn-sm"><i class="fa fa-edit" style="color:#fff"></i> Edit</a>
                                        <a type="button" href="{{ route('admin.Master.transaction.type.delete',Crypt::encrypt($transactionType->id)) }}" onclick="return confirm('Are you sure you want to delete this item?');"  title="" class="btn btn-danger btn-sm" style="color:#fff"><i class="fa fa-trash"></i> Delete</a>
                                    </td>
                                 </tr> 
                                @endforeach
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
    $(document).ready(function(){
        $('#Transaction_Type_table').DataTable();
    });
</script> 
@endpush

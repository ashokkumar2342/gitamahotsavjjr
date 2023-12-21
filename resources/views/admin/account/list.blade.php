@extends('admin.layout.base')
@section('body')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h3>List Users</h3>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right"> 
                </ol>
            </div>
        </div> 
        <div class="card card-info"> 
            <div class="card-body">
               
              <div class="col-lg-12">
              <div class="table-responsive">
              <table id="dataTable" class="table table-bordered table-striped table-hover">
                <thead>
                <tr>
                  <th>Sr.No.</th> 
                  <th>Name</th>
                  <th>Mobile</th> 
                  <th>Email Id</th>
                  <th>Role</th> 
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @php
                  $arrayId=1;
                     
                  @endphp
                @foreach($accounts as $account) 
                <tr>
                  <td>{{ $arrayId ++ }}</td> 
                  <td>{{ $account->first_name }} {{ $account->last_name}}</td>
                  <td>{{ $account->mobile }}</td> 
                  <td>{{ $account->email }}</td>
                  <td>{{ $account->name or '' }}</td> 
                  <td> 
                  <a href="#" onclick="callPopupLarge(this,'{{ route('admin.account.edit',Crypt::encrypt($account->id)) }}')" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                  
                
                  

                  
                   
                  
                  </td>
                </tr> 
                @endforeach
                </tbody>
              </table>
            </div>
            </div>
            </div>
             
            </div> 
        </div>
    </div>     
    </section>
    @endsection
@push('links')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush
@push('scripts')
 <script type="text/javascript" src="//cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script type="text/javascript">
     $(document).ready(function(){
        $('#dataTable').DataTable();
    });
     
 
//  $( "#status" ).click(function() {
//   $.ajax({
//     method:"post",
//     url:"";
//     data:
//   })
//     $.ajax({
//           method: "get",
//           url: "",
//           data: { id: $(this).val() }
//         })
//         .done(function( response ) {            
//             if(response.length>0){
//                 $('#class').html('<option value="">Select Class</option>');
//                 for (var i = 0; i < response.length; i++) {
//                     $('#class').append('<option value="'+response[i].id+'">'+response[i].alias+'</option>');
//                 } 
//             }
//             else{
//                 $('#class').html('<option value="">Not found</option>');
//             }
            
//         });
//     });
// });
 
</script>
<script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
<script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>  
   
@endpush
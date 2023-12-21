<div class="row"> 
  <div class="col-lg-12 table-responsive"> 
    <table class="table table-bordered table-striped table-hover" id="result_datatable" width = "100%">
      <thead>
        <tr> 
          <th>SHG Name</th>
          <th>NRLM SHG Code</th>
          <th>Formation Date</th>
          <th>account_no</th>
          <td>Bank Name</td>
          <td>Branch Name</th> 
          </tr>
        </thead>
        <tbody> 
          @foreach ($rs_result as $rs_data) 
          <tr> 
            <td>{{ $rs_data->shg_name }}</td> 
            <td>{{ $rs_data->shg_code }}</td> 
            <td>{{ $rs_data->formation_date }}</td> 
            <td>{{ $rs_data->account_no }}</td> 
            <td>{{ $rs_data->bank_name }}</td> 
            <td>{{ $rs_data->branch_name }}</td>  
          </tr> 
          @endforeach 
        </tbody>
      </table>
    </div>
  </div> 
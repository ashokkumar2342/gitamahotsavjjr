<div class="row"> 
  <div class="col-lg-12 table-responsive">
    
    <table class="table table-bordered table-striped table-hover" id="result_datatable" width = "100%">
      <thead>
          <tr bgcolor="gray"> 
            <td><b>District</b></td>
            <td><b>Block</b></td>
            <td><b>GP</b></td>
            <td><b>Village</b></td>
            <td><b>SHG Name / SHG Code</b></td>
            <td><b>Data of Formation</b></td> 
            <td><b>Account No. / Bank Name / Branch Name / Date of Opening Account No.</b></td> 
            <td>&nbsp;</td> 
          </tr>
        </thead>

        <tbody>
      @foreach($rs_result as $key=>$rs_data)
        @php
          $shgmemberdetails= Illuminate\Support\Facades\DB::select(DB::raw("select `smd`.`member_name`, `smd`.`relation_name`, `smd`.`dob`, `smd`.`mobile_no`, `smd`.`aadhar_no`, `smd`.`ppp`, `smd`.`account_no`, `smd`.`ifsc_code`, `smd`.`bank_name`, `smd`.`joining_date`, `smd`.`ac_open_date`, `gt`.`gender_name`, `rt`.`type_name`, `dt`.`desig_name`, `dsbt`.`type_name` as `disability_name` from `shg_member_detail` `smd`  inner join `gender_type` `gt` on `gt`.`id` = `smd`.`gender_id` inner join `religion_type` `rt` on `rt`.`id` = `smd`.`caste` inner join `shg_member_desig_type` `dt` on `dt`.`id` = `smd`.`designation_id` inner join `disability_type` `dsbt` on `dsbt`.`id` = `smd`.`disability`  where `smd`.`shg_id` =$rs_data->shg_id"));
        @endphp
          @if($key > 0)
          <tr bgcolor="gray"> 
            <td><b>District</b></td>
            <td><b>Block</b></td>
            <td><b>GP</b></td>
            <td><b>Village</b></td>
            <td><b>SHG Name / SHG Code</b></td>
            <td><b>Data of Formation</b></td> 
            <td><b>Account No. / Bank Name / Branch Name / Date of Opening Account No.</b></td> 
            <td>&nbsp;</td> 
          </tr>
          @endif
          
        
          <tr> 
            <td>{{ $rs_data->d_name }}</td> 
            <td>{{ $rs_data->b_name }}</td> 
            <td>{{ $rs_data->gp_name }}</td> 
            <td>{{ $rs_data->v_name }}</td> 
            <td>{{ $rs_data->shg_name }} / {{ $rs_data->shg_code }}</td> 
            <td>{{ $rs_data->formation_date }}</td>  
            <td>{{ $rs_data->account_no }} / {{ $rs_data->bank_name }} / {{ $rs_data->branch_name }} / {{ $rs_data->account_opening_date }} / </td>
            <th>&nbsp;</th>  
          </tr>
          <tr bgcolor="lightgray"> 
            <td><b>Member Name</b></td>
            <td><b>Fatder/Husband</b></td> 
            <td><b>DOB/Age</b></td> 
            <td><b>Mobile No.</b><br><b>Aadhar No.</b><br><b>PPP</b></td> 
            <td>Gender<br>Caste</td> 
            <td><b>Account No</b><br> <b>Ifsc Code</b> <br> <b>Bank Name</b> </td> 
            <td> <b>Joining Date</b> <br> <b>Account Openig Date</b> </td> 
            <td> <b>Designation</b> <br> <b>Disability</b> </td> 
          </tr> 
        
           @foreach ($shgmemberdetails as $shgmemberdetail)
            <tr> 
              <td>{{ $shgmemberdetail->member_name }}</td>
              <td>{{ $shgmemberdetail->relation_name }}</td>
              <td>{{ $shgmemberdetail->dob }}</td> 
              <td>{{ $shgmemberdetail->mobile_no }}<br>{{ $shgmemberdetail->aadhar_no }}<br>{{ $shgmemberdetail->ppp }}</td> 
              <td>{{ $shgmemberdetail->gender_name }}<br>{{ $shgmemberdetail->type_name }}</td> 
              <td>{{ $shgmemberdetail->account_no }}<br>{{ $shgmemberdetail->ifsc_code }}<br>{{ $shgmemberdetail->bank_name }}</td>  
              <td>{{ $shgmemberdetail->joining_date }}<br>{{ $shgmemberdetail->ac_open_date }}</td>
              <td>{{ $shgmemberdetail->desig_name }}<br>{{ $shgmemberdetail->disability_name }}</td> 
            </tr> 
          @endforeach 
      @endforeach

        </tbody>
    </table>    
  </div>
</div> 
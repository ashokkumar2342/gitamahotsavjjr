<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <div class="modal-header">
      <h4 class="modal-title">Member List</h4>
      <button type="button" id="btn_close" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="col-lg-12 text-center">
        <b>Group Name : {{$groupName[0]->group_name}}</b>
      </div>
    <div class="table-responsive"> 
     <table id="self_group" class="table table-striped table-hover table-bordered">
         <thead style="background-color: #605f6a;color: #fff">
             <tr>
                 {{-- <th class="text-nowrap">States</th>
                 <th class="text-nowrap">District</th>
                 <th class="text-nowrap">Block MCS</th>
                 <th class="text-nowrap">Gram Panchayat</th> --}}
                 {{-- <th class="text-nowrap">Village</th> --}}
                 <th class="text-nowrap">Member Name</th>
                 {{-- <th class="text-nowrap">Insurance Type</th> --}}
                 <th class="text-nowrap">Aadhar No.</th>
                 <th class="text-nowrap">PPP ID</th>
                 <th class="text-nowrap">Mobile No.</th>
                 {{-- <th class="text-nowrap">Bank Name</th>
                 <th class="text-nowrap">Branch Name</th>
                 <th class="text-nowrap">Account No.</th> --}}
                 
                 <th class="text-nowrap">Action</th>
                  
             </tr>
         </thead>
         <tbody>
            @foreach ($rs_updates as $rs_update)
            
             <tr>
                 {{-- <td>{{ $rs_update->state_id }}</td>
                 <td>{{ $rs_update->district_id }}</td>
                 <td>{{ $rs_update->block_id }}</td>
                 <td>{{ $rs_update->panchayat_id }}</td> --}}
                 {{-- <td>{{ $rs_update->village_id }}</td> --}}
                 <td>{{ $rs_update->member_name }}</td>
                 {{-- <td>{{ $rs_update->insurance_type }}</td> --}}
                 <td>{{ $rs_update->aadhar_no }}</td>
                 <td>{{ $rs_update->ppp }}</td>
                 <td>{{ $rs_update->mobile_no }}</td>
                {{--  <td>{{ $rs_update->bank_name }}</td>
                 <td>{{ $rs_update->branch_name }}</td>
                 <td>{{ $rs_update->account_no }}</td> --}}
                 
                 <td class="text-nowrap">
                    
                     

                     <a onclick="callPopupLevel2(this,'{{ route('admin.shg.detail.selfhelpgroup.edit.member',[Crypt::encrypt($rs_update->id),$selfHelpGroupid]) }}')" title="Edit" class="btn btn-info btn-xs" style="color:#fff"><i class="fa fa-pencil"></i> Update Member</a>

                     

                     
                 </td>
             </tr> 
            @endforeach
         </tbody>
     </table>
    </div> 
    {{-- <a onclick="callPopupLevel2(this,'{{ route('admin.shg.detail.selfhelpgroup.addleb2',Crypt::encrypt($selfHelpGroupid)) }}')" title="Edit" class="btn btn-lg btn-info btn-xs" style="color:#fff"><i class="fa fa-plus"></i> Add Member</a> --}}
    </div>
  </div>
</div>


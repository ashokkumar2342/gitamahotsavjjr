<button type="button" class="btn btn-info btn-sm pull-right" style="margin:10px" onclick="callPopupLarge(this,'{{ route('admin.sgh.selfhelpgroup.add')}}'+'?district_id='+$('#district_select_box').val()+'&block_mc='+$('#block_select_box').val()+'&gram_panchayat='+$('#gram_panchayat').val()+'&village='+$('#village_select_box').val())">Add New SHG</button>
<div class="table-responsive"> 
     <table id="self_group" class="table table-striped table-hover table-bordered">
         <thead style="background-color: #605f6a;color: #fff">
             <tr>
                <th class="text-nowrap">SHG Name</th>
                <th class="text-nowrap">Formation Date</th> 
                <th class="text-nowrap">Total Member</th> 
                <th class="text-nowrap">Bank Account No.</th>
                <th class="text-nowrap">Bank Branch Name.</th>
                <th class="text-nowrap">Bank IFSC.</th>

                <th class="text-nowrap">Action</th>
                  
             </tr>
         </thead>
         <tbody>
            @foreach ($selfHelpGroupList as $selfHelpGroupList)
            
             <tr>
                 
                 <td>{{ $selfHelpGroupList->shg_name }}</td>
                 <td>{{ $selfHelpGroupList->formation_date }}</td>
                 <td>{{ $selfHelpGroupList->total_member }}</td>
                 <td>{{ $selfHelpGroupList->bank_account_no }}</td>
                 <td>{{ $selfHelpGroupList->bank_branch_name }}</td>
                 <td>{{ $selfHelpGroupList->bank_ifsc }}</td>

                 <td class="text-nowrap">
                    
                    {{--  <a onclick="callPopupLarge(this,'{{ route('admin.shg.detail.selfhelpgroup.add',Crypt::encrypt($selfHelpGroupList->id)) }}')" title="Edit" class="btn btn-info btn-xs" style="color:#fff"><i class="fa fa-plus"></i> Add Member</a>

                     <a id="view_update_button{{ $selfHelpGroupList->id }}" onclick="callPopupLarge(this,'{{ route('admin.shg.detail.selfhelpgroup.view.member',Crypt::encrypt($selfHelpGroupList->id)) }}')" title="Edit" class="btn btn-info btn-xs" style="color:#fff"><i class="fa fa-pencil"></i>      View & Update Member</a> --}}

                     <a onclick="callPopupLarge(this,'{{ route('admin.shg.detail.selfhelpgroup.edit',Crypt::encrypt($selfHelpGroupList->id)) }}')" title="Edit" class="btn btn-info btn-xs" style="color:#fff"><i class="fa fa-edit"></i> Edit</a>

                     
                 </td>
             </tr> 
            @endforeach
         </tbody>
     </table>
    </div> 
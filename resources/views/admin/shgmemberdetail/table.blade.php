<button type="button" class="btn btn-info btn-sm pull-right" style="margin:10px" onclick="callPopupLarge(this,'{{ route('admin.shgmemberdetailaddForm')}}'+'?district_id='+$('#district_select_box').val()+'&block_mc='+$('#block_select_box').val()+'&gram_panchayat='+$('#gram_panchayat').val()+'&village='+$('#village_select_box').val()+'&shg_id='+$('#shg_select_box').val())"> <i class="fa fa-plus"></i> Add New Member</button>
<div class="table-responsive"> 
    <table id="self_group" class="table table-striped table-hover table-bordered">
        <thead style="background-color: #605f6a;color: #fff">
            <tr>
                <th class="text-nowrap">Member Name</th> 
                <th class="text-nowrap">Mobile No.</th>
                <th class="text-nowrap">Aadhar No.</th>
                <th class="text-nowrap">PPP ID</th>
                <th class="text-nowrap">Account No.</th>
                <th class="text-nowrap">Bank Name</th>
                <th class="text-nowrap">Action</th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($shgMemberDetails as $shgMemberDetail) 
            <tr> 
                <td>{{ $shgMemberDetail->member_name }}</td>
                <td>{{ $shgMemberDetail->mobile_no }}</td>
                <td>{{ $shgMemberDetail->aadhar_no }}</td>
                <td>{{ $shgMemberDetail->ppp }}</td>
                <td>{{ $shgMemberDetail->account_no }}</td>
                <td>{{ $shgMemberDetail->bank_name }}</td>
                
                <td class="text-nowrap">
                    <a onclick="callPopupLarge(this,'{{ route('admin.shgmemberdetailedit',Crypt::encrypt($shgMemberDetail->id)) }}')" title="Edit" class="btn btn-info btn-xs" style="color:#fff"> <i class="fa fa-pencil"></i> Edit</a> 
                </td>
            </tr> 
            @endforeach
        </tbody>
    </table>
</div> 
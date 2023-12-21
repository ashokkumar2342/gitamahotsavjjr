<button type="button" class="btn btn-info btn-sm pull-right" style="margin:10px" onclick="callPopupLarge(this,'{{ route('admin.shgmemberfamilyaddForm')}}'+'?district_id='+$('#district_select_box').val()+'&block_mc='+$('#block_select_box').val()+'&gram_panchayat='+$('#gram_panchayat').val()+'&village='+$('#village_select_box').val()+'&shg_id='+$('#shg_select_box').val()+'&shg_member_detail_id='+$('#member_select_box').val())"> <i class="fa fa-plus"></i> Add New Family</button>
<div class="table-responsive"> 
    <table id="self_group" class="table table-striped table-hover table-bordered">
        <thead style="background-color: #605f6a;color: #fff">
            <tr>
                 <th class="text-nowrap">Name</th> 
                 <th class="text-nowrap">Relation</th>
                 <th class="text-nowrap">DOB</th>
                 <th class="text-nowrap">Age</th>
                 <th class="text-nowrap">Gender</th>
                 <th class="text-nowrap">Action</th> 
            </tr>
        </thead>
        <tbody>
            @foreach ($shgMemberfamily as $value) 
            <tr> 
                <td>{{ $value->name }}</td>
                <td>{{ $value->relation_id }}</td>
                <td>{{ $value->dob }}</td>
                <td>{{ $value->age }}</td>
                <td>{{ $value->gender_id }}</td>
                
                
                
                <td class="text-nowrap">
                    <a onclick="callPopupLarge(this,'{{ route('admin.shgmemberfamilyEdit',Crypt::encrypt($value->id)) }}')" title="Edit" class="btn btn-info btn-xs" style="color:#fff"> <i class="fa fa-pencil"></i> Edit Family</a> 
                </td>
            </tr> 
            @endforeach
        </tbody>
    </table>
</div> 
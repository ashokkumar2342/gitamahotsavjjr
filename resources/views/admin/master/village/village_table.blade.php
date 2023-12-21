
     <table id="district_table" class="table table-striped table-hover table-bordered">
         <thead>
             <tr>
                 <th class="text-nowrap">States</th>
                 <th class="text-nowrap">District</th>
                 <th class="text-nowrap">Block MCS</th>
                 <th class="text-nowrap">Gram Panchayat</th>
                 <th class="text-nowrap">Village Code</th>
                 <th class="text-nowrap">Village Name</th>
                 <th class="text-nowrap">Action</th>
                  
             </tr>
         </thead>
         <tbody>
            @foreach ($Villages as $Village)
            
             <tr>
                 <td>{{ $Village->states->name or '' }}</td>
                 <td>{{ $Village->district->name or '' }}</td>
                 <td>{{ $Village->blockMCS->name or '' }}</td>
                 <td>{{ $Village->gramPanchayat->name or '' }}</td>
                 <td>{{ $Village->code }}</td>
                 <td>{{ $Village->name }}</td>
                 <td class="text-nowrap">
                    
                     <a type="button" onclick="callPopupLarge(this,'{{ route('admin.Master.village.edit',$Village->id) }}')" title="Edit" class="btn btn-primary btn-sm" style="color:#fff"><i class="fa fa-edit"></i> Edit</a>
                     <a type="button" success-popup="true" select-triger="gram_panchayat" onclick="callAjax(this,'{{ route('admin.Master.village.delete',$Village->id) }}')" title="Delete" class="btn btn-danger btn-sm" style="color:#fff"><i class="fa fa-trash"></i> Delete</a>
                 </td>
             </tr> 
            @endforeach
         </tbody>
     </table>
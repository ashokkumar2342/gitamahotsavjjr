<button type="button" class="btn btn-info btn-sm pull-right" style="margin:10px" onclick="callPopupLarge(this,'{{ route('admin.shg.assets.add')}}'+'?shg_id='+$('#shg_select_box').val())"> <i class="fa fa-plus"></i> Add New Assets</button>
<div class="table-responsive"> 
    <table id="self_group" class="table table-striped table-hover table-bordered">
        <thead style="background-color: #605f6a;color: #fff">
            <tr>
                <th class="text-nowrap">House</th> 
                <th class="text-nowrap">Room</th>
                <th class="text-nowrap">Barnda</th>
                <th class="text-nowrap">Kitchen</th>
                <th class="text-nowrap">Toilet</th>
                <th class="text-nowrap">Open Space</th>
                {{-- <th class="text-nowrap">Action</th>  --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($assets as $asset)
            @php
            	if ($asset->house == 1) {
            		$house = 'Own';	
            	}
            	elseif ($asset->house == 2) {
            		$house = 'Rented';	
            	}
            	elseif ($asset->house == 2) {
            		$house = 'Ancestral';	
            	}
            @endphp 
            <tr> 
                <td>{{ $house }}</td>
                <td>{{ $asset->room }}</td>
                <td>{{ $asset->branda }}</td>
                <td>{{ $asset->kitchen }}</td>
                <td>{{ $asset->toilet }}</td>
                <td>{{ $asset->open_space }}</td>
            </tr> 
            @endforeach
        </tbody>
    </table>
</div> 
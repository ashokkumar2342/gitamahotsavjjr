<!DOCTYPE html>
<html>
<head>
	<style>
	#first_table table,th,td {
		border: 1px solid black;
		border-collapse:collapse;
		text-align:left;
		height: 90px; 
	}

	@page { footer: html_otherpagesfooter; 
		header: html_otherpageheader;
	}  
</style>
</head>
<body>
	<htmlpagefooter name="otherpagesfooter" style="display:none">
		<div style="text-align:right;">
			{nbpg}  {PAGENO}
		</div>

	</htmlpagefooter>
	<htmlpageheader name="otherpageheader" style="display:none"> 
		
	</htmlpageheader>
	@foreach($shgdetails as $shgdetail)
	@php
	$shgmemberdetails= Illuminate\Support\Facades\DB::select(DB::raw("select * from `shg_member_detail` where `shg_id` =$shgdetail->shg_id"));
	@endphp 
	<p style="width: 1010px;background-color: #767d78;color: #fff;text-align: center;"><b>SHG List</b></p> 
	<table id="first_table" width="100%" style="font-size: 14px;">
		<tbody>
			<tr>
				<td width="25%">District : <b>{{$shgdetail->d_name}}</b></td>
				<td width="25%">Block : <b>{{$shgdetail->b_name}}</b></td>
				<td width="25%">GP : <b>{{$shgdetail->gp_name}}</b></td>
				<td width="25%">Village : <b>{{$shgdetail->v_name}}</b></td>
			</tr>
			<tr>
				<td colspan="2" width="50%">SHG Name : <b> {{$shgdetail->shg_name}}</b></td>
				<td colspan="2" width="50%">Data of Formation : <b>{{$shgdetail->formation_date}}</b></td>
			</tr>
			<tr>
				<td width="25%">Account No. <b>{{$shgdetail->account_no}}</b></td>
				<td width="25%">Bank Name : <b>{{$shgdetail->bank_name}}</b></td>
				<td width="25%">Branch Name : <b>{{$shgdetail->branch_name}}</b></td>
				<td width="25%">Date of Opening Account No. <b>{{$shgdetail->account_opening_date}}</b></td>
			</tr>
			<tr>
				<td width="25%">Meeting Frequency : <b>Monthly</b></td>
				<td width="25%">Manthly Amount of Saving Per Member : <b>50</b></td>
				<td width="25%">Basic Training Received : <b>No</b></td>
				<td width="25%">Active Bank Lone A/c No. : <b>1234567890</b></td>
			</tr>
			
		</tbody>
	</table>
	<p style="width: 1010px;background-color: #767d78;color: #fff;text-align: center;"><b>SHG Member List</b></p>
	
	<table id="second_table" class="table" width="100%" style="font-size: 14px;">
		<thead>
			<tr> 
				<th>Member Name</th>
				<th>Father/Husband</th> 
				<th>DOB/Age</th> 
				<th>Mobile No.<br>Aadhar No.<br>PPP</th> 
				<th>Gender<br>Caste</th> 
				<th>account_no<br>Ifsc Code<br>Bank Name</th> 
				<th>Joining Date <br> Account Openig Date</th> 
				<th>Designation <br> Disability</th> 
			</tr>
		</thead>
		<tbody> 
			@foreach ($shgmemberdetails as $shgmemberdetail) 
			<tr> 
				<td>{{ $shgmemberdetail->member_name }}</td>
				<td>{{ $shgmemberdetail->relation_name }}</td>
				<td>{{ $shgmemberdetail->dob }}</td> 
				<td>{{ $shgmemberdetail->mobile_no }}<br>{{ $shgmemberdetail->aadhar_no }}<br>{{ $shgmemberdetail->ppp }}</td> 
				<td>{{ $shgmemberdetail->gender_id }}<br>{{ $shgmemberdetail->caste }}</td> 
				<td>{{ $shgmemberdetail->account_no }}<br>{{ $shgmemberdetail->ifsc_code }}<br>{{ $shgmemberdetail->bank_name }}</td>  
				<td>{{ $shgmemberdetail->joining_date }}<br>{{ $shgmemberdetail->ac_open_date }}</td>
				<td>{{ $shgmemberdetail->designation_id }}<br>{{ $shgmemberdetail->disability }}</td>
				
				 
			</tr> 
			@endforeach 
		</tbody>
	</table>
	<pagebreak>
	
	@endforeach 
</body>
</html>

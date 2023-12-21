<option selected disabled>Select SHG Member</option>
@foreach ($shgmemberdetails as $shgmemberdetail)
<option value="{{ $shgmemberdetail->id }}">{{ $shgmemberdetail->member_name }}--{{ $shgmemberdetail->mobile_no }}</option>  
@endforeach
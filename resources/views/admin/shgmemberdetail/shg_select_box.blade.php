<option selected disabled>Select SHG</option>
@foreach ($shgdetails as $shgdetail)
<option value="{{ $shgdetail->id }}">{{ $shgdetail->shg_name }}</option>  
@endforeach
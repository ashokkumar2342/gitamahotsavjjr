<option selected disabled>Select Gram Panchayat</option>
@foreach ($GramPanchayat as $GramPanchaya)
<option value="{{ $GramPanchaya->id }}">{{ $GramPanchaya->code }}--{{ $GramPanchaya->name }}</option>  
@endforeach
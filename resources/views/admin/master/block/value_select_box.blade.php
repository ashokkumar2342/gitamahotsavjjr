<option selected disabled>Select Block MCS</option>
@foreach ($BlocksMcs as $BlocksMc)
<option value="{{ $BlocksMc->id }}">{{ $BlocksMc->code }}--{{ $BlocksMc->name }}</option>  
@endforeach
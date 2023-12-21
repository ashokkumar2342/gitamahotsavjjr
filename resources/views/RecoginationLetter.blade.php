@extends('include.main')
@section('include.main.container')
<!-- Header Close -->
<div class="banner">
	@include('include.banner')
</div>
<section class="page-heading">
	<div class="container">
		<h2>Recogination Letter</h2>
	</div>
</section>
<div class="container">
  	<table border="2" width="100%">
  		<tbody>
  			<tr>
            	<td width="50%" valign="top"><img border="1" src="{{ asset('images/img/rec_1.jpg') }}" width="422"></td>
            	<td width="50%" valign="top"><img border="1" src="{{ asset('images/img/rec_2.jpg') }}" width="422"></td>
            </tr>
            <tr><td height="20px" colspan="2"></td></tr>
            
            <tr>
            	<td valign="top"><img border="1" src="{{ asset('images/img/rec_3.jpg') }}" width="422"></td>
            	<td valign="top"><img border="1" src="{{ asset('images/img/rec_4.jpg') }}" width="422"></td>
            </tr>

  		</tbody>
  	</table>
 </div>
@endsection

		
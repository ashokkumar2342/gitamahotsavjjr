@extends('include.main')
@section('include.main.container')
<!-- Header Close -->
<div class="banner">
	@include('include.banner')
</div>
<section class="page-heading">
	<div class="container">
		<h2>Affidavit (Mrs. Renu Swami, Lecturer in Hindi)</h2>
	</div>
</section>
	<div class="container" style="overflow-x: auto;">

		  		<table border="2" width="100%">

		  			<tbody>
		  			<tr>

		            	<td width="50%" valign="top"><img border="1" src="{{ asset('images/img/aff_2_1.jpg') }}" width="422"></td>
		            	<td width="50%" valign="top"><img border="1" src="{{ asset('images/img/aff_2_2.jpg') }}" width="422"></td>

		            </tr>

		  		</tbody></table>
	</div>
@endsection

		
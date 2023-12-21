@extends('include.main')
@section('include.main.container')
<!-- Header Close -->
<div class="banner">
	@include('include.banner')
</div>
<section class="page-heading">
	<div class="container">
		<h2>Balance Sheet For The Year 2009-2010</h2>
	</div>
</section>
<section class="contact-page-section">
	<div class="container">
  		<table border="2" width="100%">

  			

  			<tbody>

  			<tr>

  				<td align="Center">

            		<img border="1" src="{{ asset('images/img/bsheet2010.jpg') }}" width="553" style="border:2px solid black;">

            	</td>

  			</tr>

  		</tbody></table>
	</div>
		
</section>

{{-- <section class="map-section">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.5733087899557!2d85.31323458697706!3d27.730457718152763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1920ba20a0d5%3A0x3ea7459e8ab1371f!2sSpyders+Lab!5e0!3m2!1sen!2snp!4v1547705422844" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
</section> --}}
@endsection

		
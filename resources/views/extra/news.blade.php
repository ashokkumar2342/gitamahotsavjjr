@extends('include.main')
@section('include.main.container')
<!-- Header Close -->
<div class="banner">
	<div class="owl-four owl-carousel">
		<img src="{{ asset('images/img/banner.jpg')}}" alt="Image of Bannner">
	</div>
	<div class="container">
		<h1>welcome to education pro</h1>
		<h3>With our advance search feature you can now find the trips for you...</h3>
	</div>
	 <div id="owl-four-nav" class="owl-nav"></div>
</div>
<section class="page-heading">
	<div class="container">
		<h2>Event & News</h2>
	</div>
</section>
<table border="2" width="100%">

  			<tbody>

  			<tr>

            	<td>

            		<table>

            			<tbody><tr>

            				<td>

            					<img border="0" src="{{ asset('images/img/new.gif') }}" width="73" height="66">

            				</td>

            				<td>

            					<p align="justify"><font size="2" color="#006666">

                                Official website of S.J.K. College

			            		of Education started on 07/06/2006

             			       </font>

            				</p></td>

            			</tr>

            		</tbody></table>

            	</td>

            </tr>

  		</tbody></table>

{{-- <section class="map-section">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3531.5733087899557!2d85.31323458697706!3d27.730457718152763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb1920ba20a0d5%3A0x3ea7459e8ab1371f!2sSpyders+Lab!5e0!3m2!1sen!2snp!4v1547705422844" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>
</section> --}}
@endsection

		
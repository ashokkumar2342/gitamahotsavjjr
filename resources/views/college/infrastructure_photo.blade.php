@extends('include.main')
@section('include.main.container')
<!-- Header Close -->
<div class="banner">
	@include('include.banner')
</div>
<section class="page-heading">
	<div class="container">
		<h2>Infrastructure Photo</h2>
	</div>
</section>
	<div class="container">
        <section class="events-section" itemprop="event" itemscope>
        	<div class="container">
        		<div class="event-wrap">
        			<div class="img-wrap" itemprop="image">
        				<img src="{{ asset('images/img/classroom.jpg') }}" alt="event images" style="border: 1px solid black;">
        				<br>
        				<b style="text-align: center;font-size: 12px;border: 1px solid black;">Class Room</b>
        			</div>
        		</div>
        		<div class="event-wrap">
        			<div class="img-wrap" itemprop="image">
        				<img src="{{ asset('images/img/girlscoomon.jpg') }}" alt="event images" style="border: 1px solid black;">
        				<br>
        				<b style="text-align: center;font-size: 12px;border: 1px solid black;">Girls Common Room</b>
        			</div>
        		</div>
        		<div class="event-wrap">
        			<div class="img-wrap" itemprop="image">
        				<img src="{{ asset('images/img/library.jpg') }}" alt="event images" style="border: 1px solid black;">
        				<br>
        				<b style="text-align: center;font-size: 12px;border: 1px solid black;">Library</b>
        			</div>
        		</div>
        		<div class="event-wrap">
        			<div class="img-wrap" itemprop="image">
        				<img src="{{ asset('images/img/principal.jpg') }}" alt="event images" style="border: 1px solid black;">
        				<br>
        				<b style="text-align: center;font-size: 12px;border: 1px solid black;">Principal Office</b>
        			</div>
        		</div>
        		<div class="event-wrap">
        			<div class="img-wrap" itemprop="image">
        				<img src="{{ asset('images/img/science.jpg') }}" alt="event images" style="border: 1px solid black;">
        				<br>
        				<b style="text-align: center;font-size: 12px;border: 1px solid black;">Science Lab.</b>
        			</div>
        		</div>
        		<div class="event-wrap">
        			<div class="img-wrap" itemprop="image">
        				<img src="{{ asset('images/img/staff.jpg') }}" alt="event images" style="border: 1px solid black;">
        				<br>
        				<b style="text-align: center;font-size: 12px;border: 1px solid black;">Staff Room</b>
        			</div>
        		</div>
        		<div class="event-wrap">
        			<div class="img-wrap" itemprop="image">
        				<img src="{{ asset('images/img/disp.jpg') }}" alt="event images" style="border: 1px solid black;">
        				<br>
        				<b style="text-align: center;font-size: 12px;border: 1px solid black;">Dispensary</b>
        			</div>
        		</div>
        		<div class="event-wrap">
        			<div class="img-wrap" itemprop="image">
        				<img src="{{ asset('images/img/psyco.jpg') }}" alt="event images" style="border: 1px solid black;">
        				<br>
        				<b style="text-align: center;font-size: 12px;border: 1px solid black;">Psychology Lab.</b>
        			</div>
        		</div>
        		<div class="event-wrap">
        			<div class="img-wrap" itemprop="image">
        				<img src="{{ asset('images/img/resource.jpg') }}" alt="event images" style="border: 1px solid black;">
        				<br>
        				<b style="text-align: center;font-size: 12px;border: 1px solid black;">Resource Room</b>
        			</div>
        		</div>
        	</div>
        </section>  		
  	</div>
@endsection

		
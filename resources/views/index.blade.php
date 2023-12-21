@extends('include.main')
@section('include.main.container')
<!-- Header Close -->
<div class="banner">
	<div class="owl-four owl-carousel" itemprop="image">
		<img src="{{ asset('quiz/image/114509.jpg')}}" alt="Image of Bannner">
		<img src="{{ asset('quiz/image/212651.jpg')}}" alt="Image of Bannner">
		
	</div>
	<div class="container" itemprop="description">
		{{-- <h1>WELCOME TO OUR COLLEGE</h1> --}}
		{{-- <h3>With our advance search feature you can now find the trips for you...</h3> --}}
	</div>
	 <div id="owl-four-nav" class="owl-nav"></div>
</div>

@endsection
